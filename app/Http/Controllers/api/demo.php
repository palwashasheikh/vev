<?php
namespace App\Http\Controllers\api\Vevesearch;
use App\Helper\ApiResponseBuilder;
use App\Http\Controllers\Controller;
use App\Models\veveCart;use App\Models\veveCategory;
use App\Models\veveProductmodifer;
use App\Models\veveProduct;
use App\Models\veveProductDetail;
use App\Models\veveRatings;
use App\Models\veveServiceCategory;
use App\Models\veveStores;
use App\Models\veveUser;
use App\Models\veveService;
use App\Models\veveAddresses;
use App\Models\vevOrder;use Illuminate\Support\Facades\Auth;
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
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            $dist = 5;
            $input = $request->SearchKeyword;
            if($request->longitude && $request->latitude) {
                $stores = DB::Select("SELECT stores.id,stores.store_name,stores.storeTypeId,vev_rating.rating,vev_rating.id, lat,stores.store_address, lng ,stores.logo,stores.banner ,3959 * 111.045*
          ASIN(SQRT( POWER(SIN(( $request->latitude - lat)*pi()/180/2),2)
          +COS($request->latitude *pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(( $request->longitude-lng)*pi()/180/2),2)))
          as distance FROM stores
              join `vev_rating`on vev_rating.store_id = stores.id
                   WHERE vev_rating.rating >= '4' AND
                    stores.store_name LIKE '%$input%' AND
          lng between ($request->longitude -$dist/cos(radians( $request->latitude))*69)
           and ( $request->longitude+$dist/cos(radians( $request->latitude))*69)
          and lat between ( $request->latitude-($dist/69))
          and ( $request->latitude+($dist/69))
          having distance < $dist  ");
                $stores_All = [];
                foreach ($stores as $stores_) {
                    $stores_All[] = $stores_;
                    array_push($stores_All, $stores_);
                    $this->responseData  = ['storename' => $stores_->store_name,
                        'distance' => $stores_->distance,
                        'banner' => $stores_->banner,
                        'Ratings' => $stores_->rating,
                    ];

                }
                if($this->responseData) {
                    ApiResponseBuilder::body(1, "Success",$this->responseData, null);
                } else {
                    ApiResponseBuilder::body(0, "Failed", null, null);
                }
            }
            $this->responseData= veveProduct::where('products.name', 'LIKE', "%{$input}%")
                ->join('product_images as primg','primg.ProductId','=','products.id')
                ->join('product_details as detail','detail.product_id','=','products.id')
                ->select('products.name as productName','products.id as productId','primg.productImages','searchtype as type','detail.price as rate')
                ->where('primg.IsPrimary','=',1)
                ->orderBy('name','DESC')->get();

            if($this->responseData) {
                ApiResponseBuilder::body(1, "Success",$this->responseData, null);
            } else {
                ApiResponseBuilder::body(0, "Failed", null, null);
            }
            $this->responseData =   veveService::where('services.name', 'LIKE', "%{$input}%")
                ->join('services_images as srimg','srimg.servicesId','=','services.id')
                ->select('services.name as serviceName','services.id as serviceId','srimg.servicesImage as serviceImage','searchtype as type','services.price as rate')
                ->where('srimg.IsPrimary','=',1)
                ->orderBy('name','DESC')->get();

            if($this->responseData) {
                ApiResponseBuilder::body(1, "Success",$this->responseData, null);
            } else {
                ApiResponseBuilder::body(0, "Failed", null, null);
            }
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function addSearch(Request $request)
    {
        $this->authorizedUser=$request->user();
        $rules = [
            'SearchKeyword' => 'required|String|min:2|regex:/^[a-zA-Z ]+$/u',
            'SearchType'=> 'required|string'
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
            foreach ($this->authorizedUser->search()->orderBy('created_at', 'DESC')->get() as $search) {
                $products = veveProduct::select(['id','name','searchtype'])->where('searchtype', $search->SearchType)->get();
                $this->responseData['products'] = $products;
                $services = veveService::select(['id','name','searchtype'])->where('searchtype', $search->SearchType)->get();
                $this->responseData['services'] = $services;
                $stores = veveStores::select(['id','store_name','searchtype'])->where('searchtype', $search->SearchType)->get();
                $this->responseData['stores'] = $stores;
            }
            ApiResponseBuilder::body(1,"Success",  $this->responseData,null);
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
    public function getSearchResultsq(Request $request)
    {
        $rules = [
            'SearchKeyword' => 'required|String|min:1|regex:/^[a-zA-Z0-9 ]+$/u',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            $dist = 5;
            $input = $request->SearchKeyword;
            $stores  =
            $this->responseData =  $stores;

            if($this->responseData) {
                ApiResponseBuilder::body(1, "Success",$this->responseData, null);
            } else {
                ApiResponseBuilder::body(0, "Failed", null, null);
            }
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }


    public function demo($input){
        $this->responseData = veveStores::
        leftjoin('products','products.storeId','stores.id')
            ->leftjoin('services','services.storeId','stores.id')
            ->leftjoin('product_details as detail','detail.product_id','=','products.id')
            ->leftjoin('product_images as primg','primg.ProductId','=','products.id')
            ->leftjoin('services_images as srimg','srimg.servicesId','=','services.id')
            ->select('stores.store_name','stores.id as storeId','stores.logo as storeImage','products.name as productName','services.name as serviceName','services.id as serviceId','srimg.servicesImage as serviceImage','services.price as rate','products.name as productName','products.id as productId','primg.productImages','detail.price as rate')
            ->where('products.name', 'LIKE', "%{$input}%")
            ->where('stores.store_name', 'LIKE', "%{$input}%")
            ->where('services.name', 'LIKE', "%{$input}%")
            ->where('primg.IsPrimary','=',1)
            ->get();
    }
}

namespace App\Http\Controllers\api\VevProducts;
use App\Helper\ApiResponseBuilder;
use App\Helper\helper;
use App\Http\Controllers\Controller;
use App\Models\veveCart;
use App\Models\veveCategory;
use App\Models\veveorderProductDetail;
use App\Models\veveProductmodifer;
use App\Models\veveProduct;
use App\Models\veveProductDetail;
use App\Models\veveRatings;
use App\Models\veveServiceCategory;
use App\Models\veveStores;
use App\Models\veveUser;
use App\Models\veveService;
use App\Models\veveAddresses;
use App\Models\vevOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;
use Validator;
use Illuminate\Http\Request;

class Products extends Controller
{
    private $authorizedUser;
    private $responseData;
    private $category;
    private $path = '/vev/content/products/';

    public function storeProfile(Request $request)
    {
        $this->homeRules = [
            'storeId' => 'Required|numeric'
        ];
        $validator = Validator::make($request->all(), $this->homeRules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            $storeId = $request->storeId;
            $storetype = $request->storetype;
            $store = veveStores::Select('store_name', 'banner', 'storedetail')->where('id', "=", $storeId)->where('storeType', "=", $storetype)->get();
            $this->responseData['storeData'] = $store;

            $category = veveCategory::with(['list' => function ($q) use ($storeId,$storetype) {
                $q->where('products.storeId', "=", $storeId)->where('products.storeType','=',$storetype)->where('product_images.IsPrimary', "=", 1);
            }])->get();
            $this->responseData['productCategory'] = $category;
            (!$this->responseData) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $this->responseData['productCategory'], null);

            $servicesCategories = veveServiceCategory::with(['list' => function ($q) use ($storeId,$storetype) {
                $q->where('services.storeId', "=", $storeId)->where('services.storeType','=',$storetype)->where('services_images.IsPrimary', "=", 1);;
            }])->get();
            $this->responseData['servicesCategory'] = $servicesCategories;
            (!$this->responseData['servicesCategory']) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $this->responseData, null);
        }

        $this->responseData['ratings'] = veveRatings::where("store_id", "=", $request->storeId)
            ->join('veve_user', 'veve_user.id', '=', 'vev_rating.user_id')
            ->select('veve_user.user_name', 'vev_rating.comments', 'vev_rating.rating', 'vev_rating.user_id')
            ->get();
        (!$this->responseData) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $this->responseData, null);

        (!$this->responseData) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $this->responseData, null);


        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function ListByCategories(Request $request)
    {
        $categoriesId = $request->categoryId;
        $type = $request->type;
        $productsdata  = veveCategory::where('productcategories.type', '=', $type)->with(['list' => function ($q) use ($categoriesId, $type) {
            $q->select('products.categoriesId', 'products.name', 'product_images.productImages', 'product_details.details', 'product_details.price','products.id');
            $q->where('products.categoriesId', "=", $categoriesId)->where('product_images.IsPrimary', "=", 1);
        }])->get();
            foreach ($productsdata as $productsdata_) {
               foreach ($productsdata_->list as $data_) {
                    $data = ['category' => $productsdata_];
                    (!$data) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $data, null);
                }
            }

        $servicesdata =   veveServiceCategory::where('servicescategories.type', '=', $type)->with(['list' => function ($q) use ($categoriesId, $type) {
            $q->select('services.categoriesId', 'services.name', 'services_images.servicesImage', 'services.serviceDetail','services.id');
            $q->where('services.categoriesId', "=", $categoriesId)->where('services_images.IsPrimary', "=", 1);
        }])->get();
            foreach ($servicesdata as $servicesdata_) {
                echo '<pre>'; print_r($servicesdata_); echo '</pre>';
                foreach ($servicesdata_->list as $data_) {
                    $data = ['category' => $servicesdata_];
                    (!$data) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $data, null);
                }
            }

        return response()->json(ApiResponseBuilder::getResponse(), 200);

    }

    public function checkcart(Request $request)
    {
        $this->authorizedUser = $request->user();
        print_r($request->user());
        if ($this->authorizedUser) {
            $this->responseData['CartItem'] = ['cartCount' => 1];
        } else if (!$this->authorizedUser) {
            $this->responseData['CartItem'] = ['cartCount' => 0];
        }
        (!$this->responseData) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $this->responseData, null);
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function singleProduct(Request $request)
    {
        $access_token = $request->header('Authorization');
        if (!empty($access_token)) {
            $auth_header = explode(' ', $access_token);
            $token = $auth_header[1];
            $split = str_split($token);
            $id = $split[0] . $split[1];
            $ids = DB::table('personal_access_tokens')->where('id', $id)->first();
        }
        if ($ids) {
            $r = $request->user('sanctum')->id;
            $cart = veveCart::where('userId', '=', $r)->select(array(DB::raw('COUNT(cartId) as CartCount')))->get();
            $this->responseData['CartItem'] = ['cartCount' => $cart];
        } else {
            $this->responseData['CartItem'] = ['cartCount' => '0'];
        }
        $products = veveProductDetail::where('product_id', $request->ProductId)
            ->join('products', 'products.id', 'product_details.product_id')
            ->select('products.id', 'product_details.details', 'product_details.price'
                , 'products.name')
            ->get();
        $this->responseData['Products'] = $products;
        $this->responseData['product_images'] = DB::table('product_images')->select('product_images.id as imageId', 'product_images.productImages')->where('ProductId', $request->ProductId)->get();
        $modifiers = veveProductmodifer::select('ModifierId', 'Attribute', 'Value', 'ProductId')->where('ProductId', "=", $request->ProductId)->get(0);
        $attributes = [];
        $finalmodifier = [];

        foreach ($modifiers as $k => $modifier) {
            if (!in_array($modifier->Attribute, $attributes)) {
                //  $attributes[$modifier->Attribute][][$modifier->Attribute] =  $modifier->Value;
                $attributes[$modifier->Attribute][] = array_merge(array('Value' => $modifier->Value), array('ModifierId' => $modifier->ModifierId));
            }
//            $attributes[][$modifiers->Attribute] = $modifiers->Value;
            $finalmodifier = $attributes;
        }

        $i = 0;
        foreach ($finalmodifier as $key => $modifiers) {
            $i++;
            $this->responseData['ModifierName' . ($i)] = $key;
            $this->responseData['Modifiers' . ($i)] = $modifiers;
        }
        // $this->responseData = $FinalAttributes;
        (!$this->responseData) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $this->responseData, null);
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function addToCart(Request $request)
    {
        $this->authorizedUser = $request->user();
        $rules = [
            'modifier1' => 'required|string',
            'modifier2' => 'required|string',
            'ProductId' => 'required|numeric',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            $data = [
                'modifier1' => $request->modifier1,
                'modifier2' => $request->modifier2,
                'userId' => auth()->user()->id,
                'ProductId' => $request->ProductId,
            ];
            $cart = veveCart::create($data);
            $this->responseData = array(
                'data' => $cart
            );
            ApiResponseBuilder::body(1, "Success", $this->responseData, null);
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function itemRemove(Request $request)
    {
        $this->authorizedUser = $request->user();
        $cartRemove = veveCart::where('cartId', '=', $request->cartId)->delete();
        if ($cartRemove) {
            ApiResponseBuilder::body(1, "Success", $cartRemove, null);
        } else {
            ApiResponseBuilder::body(1, "Failed", $cartRemove, null);
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function showCartdetail(Request $request)
    {
        $this->authorizedUser = $request->user();
        $cart = DB::table('cart as cr')
            ->leftjoin('products as pro', 'pro.id', '=', 'cr.ProductId')
            ->leftjoin('product_images as img', 'img.ProductId', '=', 'cr.ProductId')
            ->leftJoin('product_details', 'product_details.product_id', '=', 'cr.ProductId')
            ->Select('cr.modifier1', 'cr.modifier2', 'pro.name', 'cr.quantity', 'cr.ProductId', 'img.productImages', 'product_details.price','cr.cartId')
            ->where('img.IsPrimary', '=', 1)
            ->get();
        if ($cart) {
            ApiResponseBuilder::body(1, "Success", $cart, null);
        } else {
            ApiResponseBuilder::body(1, "Failed", $cart, null);

        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function updatequantity(Request $request)
    {
        $this->authorizedUser = $request->user();
        $cart = veveCart::where('ProductId', '=', $request->ProductId)->update(['quantity' => $request->quantity]);
        if ($cart) {
            ApiResponseBuilder::body(1, "Success", null, null);
        } else {
            ApiResponseBuilder::body(1, "Failed", $cart, null);
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function ProceedCheckout(Request $request)
    {
        $this->authorizedUser = $request->user();
        $shippingAddress = veveAddresses::where('userId', '=', auth()->user()->id)->where('Isdefault', '=', 1)->get();
        $this->responseData['ShippingAddress'] = $shippingAddress;
        $this->responseData['Payment'] = $data = ['String' => '43534456'];
        $cartData = DB::table('cart as cr')->leftjoin('product_images as img', 'img.ProductId', '=', 'cr.ProductId')
            ->leftJoin('products', 'products.id', '=', 'cr.ProductId')
            ->leftJoin('product_details', 'product_details.product_id', '=', 'cr.ProductId')
            ->Select('products.name', 'cr.modifier1', 'cr.modifier2', 'cr.quantity', 'cr.ProductId', 'img.productImages', 'product_details.price')
            ->where('img.IsPrimary', '=', 1)
            ->where('userId', '=', auth()->user()->id)
            ->get();
        $this->responseData['CartItem'] = $cartData;


        (!$this->responseData) ? ApiResponseBuilder::body(0, "Failed", null, null) : ApiResponseBuilder::body(1, "Success", $this->responseData, null);
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function orderPlaced(Request $request)
    {
        $this->authorizedUser = $request->user();
        $data = json_decode(file_get_contents("php://input"), true);

        if (!empty($data["OrderDetail"])) {
            $order = vevOrder::create([
            'OrderCode' => helper::getOrderCode(),
            'userId'=> $data["OrderDetail"][0]['userId'],
            'AddressId' => $data["OrderDetail"][0]["AddressId"],
            'total' => $data["OrderDetail"][0]["total"],
            'PaymentMethodId' => (int)$data["OrderDetail"][0]["PaymentMethodId"],
            'orderstatus' => 1
             ]);
            if ($order != null) {
                if (!empty($data["OrderProducts"])) {
                    foreach ($data["OrderProducts"] as $item) {
                        $opd = veveorderProductDetail::create([
                            'OrderId' => $order->orderId,
                      'ProductId' => $item["ProductId"],
                       'Modifier1' => $item["Modifier1"],
                       'Modifier2' => $item["Modifier2"],
                        'Quantity' => $item["Quantity"],
                        ]);
                        if ($opd) {
                            ApiResponseBuilder::body(1, "Success", null, null);
                        } else {
                            ApiResponseBuilder::body(0, "failed", null, null);
                        }
                    }
                }
            }
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);

    }
}


?>
