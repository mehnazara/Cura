<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Patient;

class PatientDashboard extends Controller
{
    function profile(){
        return view('patient');
    }

    function updateProfile(Request $request){

        if(!$request->email){
            $user = Patient::where('phone', $request->phone)->first();
            $user->phone = $request->newphone;
            $user->save();
            return redirect(route('patientprofile'))->with('success', 'Phone Number Changed!');

        } else {
            $user = Patient::where('email', $request->email)->first();
            $user->phone = $request->newphone;
            $user->save();
            return redirect(route('patientprofile'))->with('success', 'Phone Number Changed!');

        }



        

    }

}
