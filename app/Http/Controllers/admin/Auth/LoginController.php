<?php

namespace App\Http\Controllers\admin\Auth;
use App\Http\Controllers\Controller;
use App\Models\veveRole;
use App\Models\veveUser;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;
use Validator;
use Illuminate\Http\Request;


class LoginController extends Controller
{


    public function login()
    {
        return view('admin.auth.login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginattempt(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            ApiResponseBuilder::body(0, ApiResponseBuilder::getMessage($validator), null, $validator->errors());
        } else {
            if(auth()->attempt(array('user_email'=>$request->email, 'password'=> $request->password))){
                ///$request->session()->put('loginId', $user->id);
                if (auth()->user()->role_id == 1) {
                    return redirect()->route('adminDash');
                } elseif (auth()->user()->role_id== 2) {
                    return redirect()->route('vendDash');
                } elseif (auth()->user()->role_id == 3) {
                    return redirect()->route('ServicesProvider');
                } else {
                    return redirect()->route('admin.login')->with('error', 'Wrong Credential');
                }
            }
        }
    }
    public  function  logout()
    {
        Auth::logout();
            return redirect()->route('admin.login');

    }


}

