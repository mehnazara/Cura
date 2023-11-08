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

        try {
            $user = Socialite::driver('google')->user();

            $old_user = Patient::where('google_id', $user->getId())->first();
            
            if (!$old_user){
            $new_user = Patient::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName()),
                    'google_id' => $user->getId(),
                ]);

                $credentials = array('email' => $new_user->email, 'password' => $new_user->name);

                if(Auth::attempt($credentials)){
                    return redirect(route('home'))->with('success', 'Login successful!');
                }

                return $credentials;
            } else {

                $credentials = array('email' => $old_user->email, 'password' => $old_user->name);

                if(Auth::attempt($credentials)){
                    return redirect(route('home'))->with('success', 'Login successful!');
                }

            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        }
    
}
