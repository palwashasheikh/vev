<?php

namespace App\Http\Controllers\api\VeveOrder;
use App\Helper\ApiResponseBuilder;
use App\Http\Controllers\Controller;
use App\Models\vevOrder;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;


class Order extends Controller
{
    private $authorizedUser;
    private $responseData;
    public function orderList(Request $request)
    {
        $this->authorizedUser = $request->user();
         $datas = vevOrder::select('orderId','OrderCode','total','orderDate','type')
             ->where('userId','=',auth()->user()->id)
             ->get();

        foreach ($datas as $data)
        {
             $station_ids[] =  $data;
            $this->responseData  = $station_ids;
        }
        ApiResponseBuilder::body(1, "Success", $this->responseData, null);
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function orderDetail(Request $request)
    {
        $this->authorizedUser = $request->user();
         $order = vevOrder::select('OrderCode','orderDate')->where('orderId' ,'=', $request->orderId)->get();
         $address  = vevOrder::
            where('orderId','=',$request->orderId)
            ->join('shippingAdresses as addr','addr.AddressId','orders.orderId')
            ->select('addr.HouseNo','addr.streetNo','addr.postalCode','addr.city','addr.state','addr.country')
            ->get();


//     $orderItem = DB::table('orders as or')
//          ->leftJoin('orderservicesDetail as ordsr',"ordsr.orderId","=","or.orderId")
//          ->leftjoin('appoimentservice as sr','sr.id','=',"ordsr.appoimentserviceId")
//          ->leftjoin('orderproductdetail as ordpr',"ordpr.orderId","=","or.orderId")
//          ->leftJoin('products as prd','pr.id','=','ordpr.ProductId')
//          ->select('ordpr.Modifier1','ordpr.Modifier2','ordpr.Quantity','pr.name','sr.subservicesName as serviceName','or.total')
//          ->where('or.orderId' ,'=', $request->orderId)
//          ->get();


        $orderItem   = DB::select('select `ordpr`.`Modifier1`, `ordpr`.`Modifier2`, `ordpr`.`Quantity`, CASE WHEN `pr`.`name` is null then `sr`.`subservicesName` else `pr`.`name` END as `name`, `or`.`total` from `orders` as `or` left join `orderservicesDetail` as `ordsr` on `ordsr`.`orderId` = `or`.`orderId` left join `appoimentservice` as `sr` on `sr`.`id` = `ordsr`.`appoimentserviceId` left join `orderproductdetail` as `ordpr` on `ordpr`.`orderId` = `or`.`orderId` left join `products` as `pr` on `pr`.`id` = `ordpr`.`ProductId` where `or`.`orderId` = '.$request->orderId);

        $data = [ 'OrderDetail' => $order,
            'Address' => $address,
            'Orderitem' => $orderItem,
        ];

        ApiResponseBuilder::body(1, "Success",$data, null);

        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }



}
