<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use App\Models\Patient;

class GoogleLogin extends Controller
{
    //
    function googlelogin(){
        return Socialite::driver('google')->redirect();
    }

    function callbackfromGoogle(){
            $user = Socialite::driver('google')->user();

            
            $saveUser = Patient::where('email',$user->getEmail())->first();
            print_r($saveUser);
            Auth::loginUsingId($saveUser->id);
            if(Auth::check()){
                return redirect(route('home'))->with('success','Login successful!');
            } else {
                return redirect(route('login'))->with('error','Failed to login');
            }
        }
    
}
