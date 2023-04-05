<?php
namespace App\Http\Controllers\api\VeveAddress;
use App\Helper\ApiResponseBuilder;
use App\Http\Controllers\Controller;
use App\Models\veveAddresses;
use App\Models\veveUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
class Address extends Controller
{
    private $authorizedUser;
    private $responseData;
    public function AddUserAddress(Request  $request)
    {
        $this->authorizedUser = $request->user();
        $rules = [
            'HouseNo' => 'required|string',
            'streetNo' => 'required|string',
            'postalCode' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
          $data = [
              'HouseNo'=> $request->HouseNo,
              'streetNo'=>$request->streetNo,
              'postalCode'=>$request->postalCode,
              'city'=>$request->city,
              'country'=>$request->country,
              'state'=>$request->state,
              'userId'=> auth()->user()->id,
              'Isdefault' => $request->Isdefault,
          ];
            $address = veveAddresses::create($data);
            $this->responseData = array(
                "Address" => $address,
            );
           if($this->responseData){
               ApiResponseBuilder::body(1, "Success", $this->responseData, null);
           }
           else{
               ApiResponseBuilder::body(0, "Failed",null, null);
            }
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }
     public  function ShowAllAddress(Request $request){

         $this->authorizedUser = $request->user();
         $address = veveAddresses::where('userId',"=",auth()->user()->id)->get();
         $responseData['Address'] = $address;
        if( $responseData){
            ApiResponseBuilder::body(1, "Success",  $responseData, null);
        }
        else{
            ApiResponseBuilder::body(0, "Failed",null, null);
        }

         return response()->json(ApiResponseBuilder::getResponse(), 200);
     }
     public function isDefaultAddress(Request $request)
     {
         $this->authorizedUser = $request->user();
         $ddressid   =  $request->AddressId;
  
         DB::table('shippingAdresses')->where('userId','=',auth()->user()->id)->update(['Isdefault'=> 0 ]);
         DB::table('shippingAdresses')->where('AddressId','=',$ddressid)->where('userId','=',auth()->user()->id)->update(['Isdefault' => 1]);

                 ApiResponseBuilder::body(1, "Success", null, null);

         return response()->json(ApiResponseBuilder::getResponse(), 200);
     }
}
