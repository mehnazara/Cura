<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Patient;

class Password extends Controller
{
    function forgotpassword(){
        return view('forgotpassword');
    }

    function forgotpasswordpost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:patients'
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send("email.resetpassword", ['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect(route('password.forgot'))->with("success", 'We have sent an email to reset your password');
    }

    function resetpassword($token){
        return view('newpassword', compact('token'));

    }

    function resetpasswordpost(Request $request){
        $request->validate([
            "email" => "required|email|exists:patients",
            "password" => "required|string|min:10",
            "confirm-password" => "required|same:password"

        ]);

        $updatePassword = DB::table('password_reset_tokens')->where([
            "email" => $request->email,
            "token" => $request->token
        ])->first();

        if (!$updatePassword){
            return redirect(route('password.reset'))->with('error','Invalid');
        }

        Patient::where(['email' => $request->email])
        ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();
        
        return redirect(route('login'))->with('success', 'Password has been successfully changed.');

    }
}
