<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponseBuilder;
use App\Mail\Email_detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\veveUser;
use Auth;

class CustomAuthController extends Controller
{
//    public function __construct()
//    {
//
//        $this->middleware('guest')->except('SignOut');
//
//    }

    public function index()
    {
        return view('auth.login');
    }


    public function customLogin(Request $request)
    {
         $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = veveUser::where('user_email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect("SignIn")->with('error', 'Wrong Credential');
        }
        else{
            $data = $request->input();
            $request->session()->put('user',$user);
            $request->session()->put('email',$data['email']);
            $request->session()->put('username',$data['email']);

        }
        return  redirect('/fc');
    }



    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {
//        $request->validate([
//            'name' => 'required',
//            'email' => 'required|unique:veve_user,User_email',
//            'phone' => 'required|unique:veve_user,user_phonenumber',
//            'password' => 'required|min:6',
//        ]);


        $data = $request->all();
        $this->create($data);
          return view('auth.otp',);
    }

    public function create(array $data)
    {
        return veveUser::create([
            'user_name' => $data['name'],
            'user_email' => $data['email'],
            'user_phonenumber' => $data['phone'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function dashboard()
    {
        if(Auth::check()){
            return view('/fc');
        }

        return redirect("SignIn")->withSuccess('You are not allowed to access');
    }
    public  function Showfp(){

        return view('auth.forgotpassword');
    }

    public function SignOut() {
        Session::flush();
        Auth::logout();
        return Redirect('/fc');
    }

    public function validateUser(Request $request)
    {
            $rules = [
                'email_phone' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->with('error', 'please add Your Email/Phone');
            }
            else {
                if (is_numeric($request['email_phone'])) {
                    return Redirect('/fc');
                } else if (filter_var($request['email_phone'], FILTER_VALIDATE_EMAIL)) {
                    $userEmail = veveUser::where('user_email', '=', $request['email_phone'])->first();
                    if ($userEmail == null) {
                        ApiResponseBuilder::body(0, 'U ser Not Exist', null, null);
                    } else {
                        $token = rand(100000, 999999);
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

                        return Redirect('/fc');
                    }
                }
            }
        return Redirect('/fc');
    }
    public function ShowOtp(){
        return view('auth.otp');
    }
    public function profile()
    {
        $user = veveUser::all();
        return view('/fc',compact('user',$user));
    }


}
