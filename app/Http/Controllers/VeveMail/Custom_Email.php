<?php
namespace App\Http\Controllers\VeveMail;
use App\Mail\Email_detail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class Custom_Email extends Controller
{


 public function  send_email(){

     $details = [
         "title" => "Mail From Veve ",
         "body"  => "This is vaerify email"
         ];
     Mail::to("palwashasheikh@gmail.com")->send(new Email_detail($details));
     return "Email code Sent";
 }

}
