<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use App\Models\Attribute;
use App\Models\vevestores;
use App\Models\veveProduct;
use App\Models\veveservice;
use App\Models\veveUser;
use App\Models\vevorder;
use App\Models\PricingType;
use App\Models\Category;
use App\Models\veveServiceCategory;
use App\Models\appoimentservice;
use app\Model\veveserviceimages;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Response;
use Validator;
use function PHPUnit\Framework\exactly;

class  ServiceProviderController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','role:3:1']);
    }

    public function index(Request $request)
    {
        $storeList = veveStores::where('user_id', '=', Auth::user()->id)->get();
        $storeCount = $storeList->count();

        $srvList = veveService::join('stores', 'stores.id', '=', 'services.storeId')->where('user_id', '=', Auth::user()->id)->get();
        $srvCount = $srvList->count();
        $orderList = vevOrder::join('stores','stores.id', '=', 'orders.storeId')->get();
        $orderCount = $orderList->count();
        $newcustomer = veveUser::all()->count();
        return view('admin.ServiceProvider', compact('storeCount', 'srvCount','orderCount','newcustomer'));
    }

    public function formService()
    {
        $servicesCat = veveServiceCategory::where('isActive',1)->get();
        return view('admin.services.add',compact('servicesCat'));
    }

    public function servicesList()
    {
         $store = veveStores::where('user_id' ,'=',Auth::user()->id)->get();
         $storid = $store->first();
            $services = veveService::where('storeId','=',$storid->id)
                ->select('services.id as id','services.name as name','cat.categoriesName as categoriesName','detail.price as price','services_images.servicesImage as image')
                ->join('appoimentservice as detail','detail.servicesId','services.id')
                ->leftJoin('servicescategories as cat','cat.categoriesId','services.categoriesId')
                ->join('services_images','services_images.servicesId','services.id')->where('IsPrimary' ,'=' ,1)->get();
            return view('admin.services.create',compact('services'));
    }
    public function getService($id){
       $services = veveservice::find($id);
        return  Response::json($services);
    }
    public function storeService(Request $request)
    {
        $matchThese = array('name'=>$request->name, 'store_id'=>$request->store_id);
        if($request->hasFile('service_img')){
            $image = $request->file('service_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( storage_path('/app/public/uploads/services/' . $filename ) );
            Service::updateOrCreate($matchThese,
                [
                    'name'=>$request->name,
                    'service_code'=>$request->service_code,
                    'service_detail'=>$request->service_detail,
                    'service_img'=>$filename,
                    'store_id'=>$request->store_id,
                    'category_id'=>$request->category_id,
                    'price_type_id'=>$request->price_type_id
                ]
            );
        }
        return redirect()->route('vendDash');
    }


    public function saveService(Request $request)
    {
        $rules = [
            'serviceName' => 'required|string',
            'serviceCode' => 'required|string',
            'categoriesId' => 'required|numeric',
            'serviceDetail'=>'required|string',
            'servicedate.*.' => 'required|date',
            'duration.*.' => 'required|numeric',
            'price.*.'=> 'required|numeric',
            'image.*' => 'mimes:doc,pdf,docx,zip'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $data = [
                'name' => $request->serviceName,
                'service_code' => $request->serviceCode,
                'categoriesId' => $request->categoriesId,
                'serviceDetail' => $request->serviceDetail,
            ];
            $services = veveservice::create($data);

            foreach ($request->servicedetail  as $value) {
                $serviceDetail = [
                    'ServicesDate' => $value['date'],
                    'Servicesduration' => $value['duration'],
                    'price' => $value['price'],
                    'servicesId' => $services->id
                ];
                appoimentservice::create($serviceDetail);
            }
            //if($request->image){
                foreach ($request->image as $img){
                    $data = ['image'=>$img];
                    DB::table('services_images')->insert(['servicesId' =>$services->id, 'servicesImage' => $data]);

                }
          //  }
            return back()->with("status", "Services Addedd Succesfully.");
        }
    }


}
