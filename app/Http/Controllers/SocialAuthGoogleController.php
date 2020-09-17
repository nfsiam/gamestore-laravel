<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\User;
use Socialite;
use Auth; 
use Exception;

class SocialAuthGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callback()
    {
        try{
            $googleUser = Socialite::driver('google')->stateless()->user();
            $existUser = User::where('email',$googleUser->email)->first();
            if($existUser){
                Auth::loginUsingId($existUser->id,true);
            }
            else{
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->password = md5(rand(1,10000));
                $user->type = 'user';
                //creating username
                $splitmail = explode('@', $googleUser->email)[0];
                if (User::where('username', $splitmail)->exists()) {
                    $splitmail = $splitmail.User::count();
                }
                $user->username = $splitmail;
                $user->save();
                Auth::loginUsingId($user->id,true);
            }
            return redirect()->to('/home');
        }
        catch(Exception $e){
            return $e;
        }
    }
}
