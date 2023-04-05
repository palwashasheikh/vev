<?php

namespace App\Http\Controllers;

use App\Models\veveUser;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class FacebookController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $isUser = veveUser::where('facebook_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/fc');
            }else{
                $createUser = veveUser::create([
                    'user_name' => $user->name,
                    'user_email'=>$user->email,
                    'facebook_id' => $user->id,
                    'user_password' => encrypt('admin@123')
                ]);

                Auth::login($createUser);
                return redirect('/fc');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
