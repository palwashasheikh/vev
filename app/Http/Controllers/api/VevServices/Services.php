<?php

namespace App\Http\Controllers\api\VevServices;

use App\Helper\ApiResponseBuilder;
use App\Helper\helper;
use App\Http\Controllers\Controller;
use App\Models\appoimentservice;
use App\Models\veveorderProductDetail;
use App\Models\veveorderServiceDetail;
use App\Models\veveProduct;
use App\Models\veveRatings;
use App\Models\veveService;
use App\Models\veveStores;
use App\Models\vevOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Services extends Controller
{
    private $responseData;
    private $path = '/vev/content/services/';

   public  function singleservice(Request $request){

     $services = veveService::
         select('name','serviceDetail')
         ->where('services.id', '=', $request->serviceId)->get();
     $this->responseData['service'] = $services;
       $this->responseData['Service_images'] = DB::table('services_images')->select('services_images.id as imageId','services_images.servicesImage')->where('services_images.servicesId', '=', $request->serviceId)->get();

     ApiResponseBuilder::body(1, "Success", $this->responseData, null);
       $servicesDate  = appoimentservice::select('ServicesDate','id')->where('appoimentservice.servicesId', '=', $request->serviceId)->first();
       $this->responseData['servicesDates'] = $servicesDate;


       $this->responseData['servicesData']  = appoimentservice::leftJoin('orderservicesDetail','appoimentservice.id','orderservicesDetail.appoimentserviceId')
           ->select('appoimentservice.id','appoimentservice.id','appoimentservice.Servicesduration','appoimentservice.price','appoimentservice.servicesId','appoimentservice.subservicesName as serviceType',DB::raw('COUNT(orderservicesDetail.appoimentserviceId) as total_count'))
           ->groupBy('orderservicesDetail.appoimentserviceId')
           ->where('appoimentservice.servicesId', '=', $request->serviceId)
           ->get();

//       $this->responseData['servicestypescount']  = DB::table('orders')
//           ->select(DB::raw('COUNT(appoimentserviceId) as total_count'))
//           ->groupBy('appoimentserviceId')
//           ->get();
     //  $this->responseData['servicesData'] = $data;
       ApiResponseBuilder::body(1, "Success",$this->responseData, null);
       return response()->json(ApiResponseBuilder::getResponse(), 200);
   }
    public  function Buyservice(Request $request)
    {
        $this->authorizedUser = $request->user();
        $data = json_decode(file_get_contents("php://input"), true);
        if (!empty($data["OrderDetail"])) {
            $order = vevOrder::create([
                'OrderCode' => helper::getOrderCode(),
                'userId'=> $data["OrderDetail"][0]['userId'],
                'total' => $data["OrderDetail"][0]["price"],
                'PaymentMethodId' => (int)$data["OrderDetail"][0]["PaymentMethodId"],
                'type' =>$data["OrderDetail"][0]["type"],
                'orderstatus' => 1,

            ]);
            if ($order != null) {
                if (!empty($data["OrderServices"])) {
                    foreach ($data["OrderServices"] as $item) {
                        $opd = veveorderServiceDetail::create([
                            'OrderId' => $order->orderId,
                            'appoimentserviceId' => $item["appoimentserviceId"],
                            'date'=>$item['date']
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
