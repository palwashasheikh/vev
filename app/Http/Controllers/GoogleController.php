<?php

namespace App\Http\Controllers;

use App\Models\veveUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use function Sodium\compare;


class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback(Request  $request)
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = veveUser::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('/fc');

            }else{

                $newUser = veveUser::create([
                    'user_name' => $user->user_name,
                    'user_email'=>$user->user_email,
                    'google_id'=>$user->id,
                    'password'=>encrypt('123456dummy')
                ]);
                $data = $request->input();

                $request->session()->put('user', $user);
                $request->session()->put('username',$data['name']);
                $request->session()->put('google_id',$data['google_id']);
                Auth::login($newUser);
                $this->guard()->login($user);
               return View::make('index')->with('user', $user);
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
