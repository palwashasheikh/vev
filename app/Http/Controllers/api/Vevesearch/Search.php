<?php
namespace App\Http\Controllers\api\Vevesearch;
use App\Helper\ApiResponseBuilder;
use App\Http\Controllers\Controller;
use App\Models\veveCategory;
use App\Models\veveProductmodifer;
use App\Models\veveProduct;
use App\Models\veveProductDetail;
use App\Models\veveRatings;
use App\Models\veveSearch;
use App\Models\veveServiceCategory;
use App\Models\veveStores;
use App\Models\veveUser;
use App\Models\veveService;
use App\Models\veveAddresses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;
class Search extends Controller
{
    private $responseData;

    public function getSearchResults(Request $request)
    {
        $rules = [
            'SearchKeyword' => 'required|String|min:1|regex:/^[a-zA-Z0-9 ]+$/u',
            'latitude'=> 'required',
            'longitude'=>'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            $dist = 5;
            $input = $request->SearchKeyword;
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $this->responseData = veveStores::where('store_name', 'LIKE', "%{$input}%")
                ->join('vev_rating','vev_rating.store_id', '=' ,'stores.id')
                ->select('stores.store_name as name','stores.id as Id','stores.logo as Image','searchtype as type','stores.store_address as address',DB::raw("NULL as price"),'vev_rating.rating as Ratings',
                    DB::raw(sprintf("3959 * 111.045 *
          ASIN(SQRT( POWER(SIN(( $latitude - lat)*pi()/180/2),2)
          +COS($latitude *pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(( $longitude-lng)*pi()/180/2),2)))
          as distance"
                    )))
                    ->union
          (veveProduct::where('products.name', 'LIKE',"%{$input}%")
                ->join('product_images as primg','primg.ProductId','=','products.id')
                ->join('product_details as detail','detail.product_id','=','products.id')
                ->select('products.name as name','products.id as Id','primg.productImages as Image','searchtype as type','detail.detail as Detail','detail.price as price',DB::raw("NULL as distance"),DB::raw("NULL as Ratings"))
                ->where('primg.IsPrimary','=',1)
                ->orderBy('name','DESC')
         )
        ->union(
         veveService::where('services.name', 'LIKE', "%{$input}%")
                            ->join('services_images as srimg','srimg.servicesId','=','services.id')
                            ->select('services.name as name','services.id as Id','srimg.servicesImage as Image','searchtype as type','services.serviceDetail as Detail',DB::raw("NULL as price"),DB::raw("NULL as distance"),DB::raw("NULL as Ratings"))
                            ->where('srimg.IsPrimary','=',1)
                            ->orderBy('name','DESC')
                    )
                ->where('vev_rating.rating','>=',4)
               ->get();
            if($this->responseData->isEmpty()) {
                ApiResponseBuilder::body(1, "No such Data Exist", null, null);
            } else {
                ApiResponseBuilder::body(1, "success", $this->responseData, null);
            }
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function addSearch(Request $request)
    {
        $this->authorizedUser=$request->user();
        $rules = [
            'SearchKeyword' => 'required|String',
            'SearchType'=> 'required|string',
            'SearchTypeId'=>'required|numeric',
          ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            $this->authorizedUser->search()->Create($request->all());
            ApiResponseBuilder::body(1,"Success",null,null);
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }
        public function getSearch(Request $request)
        {
            $this->authorizedUser = $request->user();
            if ($this->authorizedUser->search()) {
                foreach($this->authorizedUser->search()->orderBy('created_at','DESC')->get() as $search){
                    $data = [];
                    switch ($search->SearchType) {
                        case 'services':
                            $services = veveStores::select(['stores.id', 'stores.store_name', 'stores.logo'])->where('stores.id', $search->SearchTypeId)->where('stores.searchtype',$search->SearchType)->first();
                            $data = [
                                'type' => $search->SearchType,
                                'id' => $services->id,
                                'name' => $services->store_name,
                                'image' => $services->logo
                            ];
                            break;
                        case 'product':
                            $product = veveStores::select(['stores.id', 'stores.store_name', 'stores.logo'])->where('stores.id', $search->SearchTypeId)->where('stores.searchtype',$search->SearchType)->first();
                            $data = [
                                'type' => $search->SearchType,
                                'id' => $product->id,
                                'name' => $product->store_name,
                                'image' => $product->logo
                            ];
                            break;
                        case 'storeproduct':
                            $storeprpduct = veveProduct::select(['products.id', 'products.name', 'product_images.productImages as image'])->join('product_images', 'product_images.id', '=', 'products.id')->where('products.id', $search->SearchTypeId)->where('products.searchtype',$search->SearchType)->first();
                            $data = [
                                'type' => $search->SearchType,
                                'id' => $storeprpduct->id,
                                'name' => $storeprpduct->name,
                                'image' => $storeprpduct->image
                            ];
                            break;
                        case 'storeservices':
                            $storeservices = veveService::select(['services.id', 'services.name', 'services_images.servicesImage as image'])->join('services_images', 'services_images.id', '=', 'services.id')->where('services.id', $search->SearchTypeId)->where('services.searchtype',$search->SearchType)->first();
                            $data = [
                                'type' => $search->SearchType,
                                'id' => $storeservices->id,
                                'name' => $storeservices->name,
                                'image' => $storeservices->image
                            ];
                    }
                   $this->responseData[]=$data;
            }
            ApiResponseBuilder::body(1,"Success",$this->responseData,null);
        }else{
            ApiResponseBuilder::body(0,"Failed",null,null);
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
        }


    public function clearSearch(Request $request){
        $this->authorizedUser=$request->user();
        $this->authorizedUser->search()->Delete();
        ApiResponseBuilder::body(1,"Success",null,null);
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

}
?>
