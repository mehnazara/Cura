<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Nurse;
use App\Models\Admin_User;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    // Other methods...
    function adlogin(){
        if(Auth::guard('admin')->check()){
            return view('admindashboard');
        }
        return view('adminlogin');
    }

    function adloginpost (Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        //dd($credentials);
        if(Auth::guard('admin')->attempt($credentials)){
            $nurses = Nurse::all();
            return view('admindashboard',compact('nurses'))->with('success', 'Admin Login successful!');
        }
        return redirect(route('adminlogin'))->with('error', 'Admin Login details are not valid!');
    }


    function adlogout(){
        Session::flush();
        Auth::guard('admin')->logout();
        return redirect(route('adminlogin'))->with('success','Admin Logout successful!');
    }

}