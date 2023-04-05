<?php
namespace App\Http\Controllers\api\vevNotification;
use App\Helper\ApiResponseBuilder;
use App\Http\Controllers\Controller;
use App\Models\veveAddresses;
use App\Models\veveNotification;
use App\Models\veveUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
class Notification extends Controller
{

    private $responseData;
    private $authorizedUser;

    public function getNotifications(Request $request){

        $this->authorizedUser=$request->user();
        foreach(veveNotification::where('UserId',auth()->user()->id)->get() as $notify) {
            $data[] = $notify;

//            $data1 = [
//                "NotificationId" => $data['ReferenceId'],
//                "NotificationType" => $notify->ReferenceType,
//                "DisplayImage" => $notify->DisplayImage,
//                "Title" => $notify->Title,
//                "MessageType" => $notify->MessageType,
//                "Message" => $notify->Message,
//                "BoldWords" => explode(',', $notify->BoldWords),
//                "Created_At" => $notify->created_at->diffForHumans()
//            ];

            if($data) {
                ApiResponseBuilder::body(1,"Success",$data,null);
            }else{
                ApiResponseBuilder::body(0,"Failed",null,null);
            }

        }

        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }


}
