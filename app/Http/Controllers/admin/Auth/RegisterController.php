<?php

namespace App\Http\Controllers\admin\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\veveRole;
use App\Models\veveUser;
use Illuminate\Http\Request;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

//    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function show()
    {

        $roles = veveRole::where('id', '!=', 1)->orWhere('role_name', '!=', 'admin')->get();
        return view('admin.auth.register', compact('roles'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:1', 'confirmed'],
            'role_id' => ['required', 'integer', 'max:11'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function signup(Request $request)
    {
        $dob = date('Y-m-d', strtotime($request->date_of_birth));
        $user = veveUser::create([
            'user_name' => $request->name,
            'user_email' => $request->email,
            'password' => Hash::make($request->password),
            'user_phonenumber' => $request->phone,
            'user_address' => $request->address,
            'IsUserMale' => $request->gender,
            'UserBirthDate' => $dob,
            'role_id' => $request->role_id,
            'UserInternetProtocol'=>$request->ip()
        ]);

        Auth::login($user);
        return redirect()->to('/home');
    }
}
