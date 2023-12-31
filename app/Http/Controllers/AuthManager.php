<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Patient;


class AuthManager extends Controller
{
    function register(){
        if(Auth::guard('web')->check()){
            return redirect(route('home'));
        }
        return view('register');
    }

    function login(){
        if(Auth::guard('web')->check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    function loginpost (Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::guard('web')->attempt($credentials)){
            return redirect(route('home'))->with('success', 'Login successful!');
        }
        return redirect(route('login'))->with('error', 'Login details are not valid!');
    }

    function registerpost (Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:patients',
            'password' => 'required',
            'birthdate' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['birthdate'] = $request->birthdate;
        $data['gender'] = $request->gender;
        $patient = Patient::create($data);
        if (!$patient){
            return redirect(route('register'))->with('error', 'Registration Failed! Try again.');
        }

        return redirect(route('login'))->with('success', 'Registration successful!');
    
    }

    function logout(){
        Session::flush();
        Auth::guard('web')->logout();
        return redirect(route('login'))->with('success','Logout successful!');
    }

    
}
