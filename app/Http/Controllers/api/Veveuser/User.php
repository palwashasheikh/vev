<?php
namespace App\Http\Controllers\api\Veveuser;
use App\Helper\ApiResponseBuilder;
use App\Mail\Email_detail;
use App\Models\veveUser;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class User extends Controller
{
    private $authorizedUser;
    private $profileImage = '/vev/content/user/user-default/';

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
            'deviceToken'=> 'required|string'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            $user = veveUser::where('user_email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                ApiResponseBuilder::body(0, "These credentials do not match our records.", null, null);
            } else {
                $token = $user->createToken($request->ip(),['deviceToken' => $request->deviceToken])->plainTextToken;

                $data = [
                    'id' => $user->id,
                    'name' => $user->user_name,
                    'email' => $user->user_email,
                    'phone' => $user->user_phonenumber,
                    'image' => $user->UserImage,
                    'UserBirthDate' => $user->UserBirthDate,
                    'user_address' => $user->user_address,
                    'IsUserMale' => $user->IsUserMale,
                ];
                $response = [
                    'User' => $data,
                    'token' => $token
                ];
                ApiResponseBuilder::body(1, "Success", $response, null);
            }
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:veve_user,User_email',
            'phone' => 'required|numeric|unique:veve_user,user_phonenumber',
            'password' => 'required',
            'deviceToken'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            $user = veveUser::create([
                'user_name' => $request->name,
                'user_email' => $request->email,
                'user_phonenumber' => $request->phone,
                'password' => Hash::make($request['password']),
                'UserInternetProtocol' => $request->ip(),
                'device_token'=> $request->deviceToken
            ]);
            $token = $user->createToken($request->ip(),['deviceToken' => $request->deviceToken])->plainTextToken;

            $this->responseData = array(
                "User" => $user,
                "Token" => $token,
            );
            ApiResponseBuilder::body(1, "Success", $user, null);
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);

    }

    public function validateUser(Request $request)
    {
        $rules = [
            'email_phone' => 'required|',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        }
        else{
            $userPhone = veveUser::where('user_phonenumber','=', $request['email_phone'])->first();
            if ($userPhone === null) {
                ApiResponseBuilder::body(0, 'User Not Exist', null, null);
            }
            else{
                ApiResponseBuilder::body(1, "phone Success", null, null);
            }
            if (filter_var($request['email_phone'], FILTER_VALIDATE_EMAIL)) {
                $userEmail = veveUser::where('user_email', '=', $request['email_phone'])->first();
                if($userEmail == null){
                    ApiResponseBuilder::body(0, 'User Not Exist', null, null);
                }
                else{
                    $token = rand(1000, 9999);
                    DB::table('password_resets')->insert([
                        'email' => $request->email_phone,
                        'token' => $token,
                        'created_at' => Carbon::now()
                    ]);
                    $send_token = ['code' => $token];
                    $detail = [
                        "title" => "passwrord Reset",
                        "body" => "Password Reset Code",
                        "code" => $send_token,
                    ];
                    Mail::to($request->email_phone)->send(new Email_detail($detail));

                    ApiResponseBuilder::body(1, "email Success", null, null);
                }
            }
        }

        return response()->json(ApiResponseBuilder::getResponse(), 200);

    }

    public function verifyUser(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:veve_user,User_email',
            'phone' => 'required|numeric|unique:veve_user,user_phonenumber'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            ApiResponseBuilder::body(1, "Success", $request->phone, null);
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function ChangePasswordUser(Request $request)
    {
        $this->authorizedUser=$request->user();
        $rules = [
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            if(Hash::check($request->currentPassword,$this->authorizedUser->password)) {
//                $this->authorizedUser->user_password = Hash::make($request->newPassword);
                if($this->authorizedUser->update()){
                    ApiResponseBuilder::body(1,"Success",null,null);
                }else{
                    ApiResponseBuilder::body(0,"Failed",null,null);
                }
            }else{
                ApiResponseBuilder::body(0,"Incorrect password",null,null);

            }
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function ChangePassword(Request $request)
    {
        $rules=[
            'password' => 'required|min:6',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            ApiResponseBuilder::body(0,ApiResponseBuilder::getMessage($validator),null,$validator->errors());
        }else{

            $user = new veveUser();
            $user->update(['password'=>Hash::make($request->password)]);
            if($user){
                ApiResponseBuilder::body(1,"Success",null,null);
            }else {
                ApiResponseBuilder::body(0,"Failed",null,null);
            }
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }

    public function send_email(){

        $detail = [
            "title" => "passwrord Reset",
            "body" => "Password Detail send",
            "code" =>   rand(100000,999999),
        ];
        Mail::to("palwashasheikh229@gmail.com")->send(new Email_detail($detail));

        return response()->json(ApiResponseBuilder::getResponse(), 200);

    }

    public function logout(Request $request){

    if(auth()->user()->tokens()->delete()){
        ApiResponseBuilder::body(1,"Success",null,null);
    }
        return response()->json(ApiResponseBuilder::getResponse(), 200);

    }

  public function verify_code(Request $request){

      $password_code =   DB::table('password_resets')->where('token', '=', $request->code);
      if($password_code = null){
          ApiResponseBuilder::body(0, 'Wrong code', null, null);
           }
      else{
          ApiResponseBuilder::body(1,"Success",null,null);
      }
      return response()->json(ApiResponseBuilder::getResponse(), 200);
  }
  public function editProfile(Request $request){

      $this->authorizedUser = $request->user();
      $user = veveUser::find($request->user()->id);
      if($user == null){
          ApiResponseBuilder::body(0, 'no such data', null, null);
      }
      else{
         if($user->user_image){

            $user_image = $user->user_image;
         }
         else{
         $user_image = 'vev/content/user/user-default/user.png';
         }
          $data = [
              'name' => $user->user_name,
              'email' => $user->user_email,
              'phone' => $user->user_phonenumber,
              'image' =>  $user_image,
              'UserBirthDate' =>  $user->UserBirthDate,
              'user_email' =>  $user->user_email,
               'user_address' =>  $user->user_address,
              'IsUserMale'=>$user->IsUserMale,
          ];
          ApiResponseBuilder::body(1,"Success",$data,null);
      }
      return response()->json(ApiResponseBuilder::getResponse(), 200);
  }
    public function updateProfile(Request $request){
        $this->authorizedUser=$request->user();
        $rules=[
            'user_name' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:5000',
            'IsUserMale'=>'required|boolean',
            'address' => 'required',
            'phone'=>'required|numeric|min:8',
            'userBirthDate'=>'required',
            'email' => 'required|email',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            ApiResponseBuilder::body(0,ApiResponseBuilder::getMessage($validator),null,$validator->errors());
        }else{
            $user= veveUser::find($request->id);
            $this->authorizedUser->user_name=$request->user_name;
            $this->authorizedUser->user_address=$request->address;
            $this->authorizedUser->IsUserMale=$request->IsUserMale;
            $this->authorizedUser->user_phonenumber=$request->phone;
            $this->authorizedUser->UserBirthDate=$request->userBirthDate;
            $this->authorizedUser->user_email=$request->email;
            $this->profilePicture=null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $extension = $request->image->extension();
                $fileName=uniqid().".".$extension;
                if($request->file('image')->move(public_path($this->profileImage),$fileName)){
                    $this->profilePicture = $this->profileImage.$fileName;
                    $this->authorizedUser->UserImage=$this->profilePicture;
                }
            }
            if($this->authorizedUser->save()){
                $data =[
                    'user_name'=> $this->authorizedUser->user_name,
                    'UserImage'  =>  $this->authorizedUser->UserImage,
                    'user_email'         =>    $this->authorizedUser->user_email
                    ];
                ApiResponseBuilder::body(1,'Success',$data,null);
            }else{
                ApiResponseBuilder::body(0,'Failed',null,null);
            }
        }
        return response()->json(ApiResponseBuilder::getResponse(), 200);
    }
}
