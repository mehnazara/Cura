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

        if ($request->newphone){
            $current_user = Auth::user();
            if($current_user->phone){
            
                $user = Patient::where('phone', $current_user->phone)->first();
                $user->phone = $request->newphone;
                $user->save();
                return redirect(route('patientprofile'))->with('success', 'Phone Number Changed!');

            } else {
                $user = Patient::where('email', $current_user->email)->first();
                $user->phone = $request->newphone;
                $user->save();
                return redirect(route('patientprofile'))->with('success', 'Phone Number Added!');
            } 

        } elseif ($request->picture){
            $current_user = Auth::user();
            $user = Patient::where('email', $current_user->email)->first();
            $user->profilePicture = $request->file('picture')->getClientOriginalName();
            $user->save();
            $request->file('picture')->move('uploads/',$user->profilePicture);
            return redirect(route('patientprofile'))->with('success', 'Profile Picture Added!');
        } else {
            $current_user = Auth::user();
            $user = Patient::where('email', $current_user->email)->first();
            $user->report = $request->file('report')->getClientOriginalName();
            $user->save();
            $request->file('report')->move('uploads/',$user->report);
            return redirect(route('patientprofile'))->with('success', 'Report Uploaded Successfully!');

        }
        



        

    }

    function imageChange(){
        return view('imageChange');
    }

    function patientUpdateImage(Request $request){
        $current_user = Auth::user();
        $user = Patient::where('email', $current_user->email)->first();
        $user->profilePicture = $request->file('picture')->getClientOriginalName();
        $user->save();
        $request->file('picture')->move('uploads/',$user->profilePicture);
        return redirect(route('patientprofile'))->with('success', 'Profile Picture Updated!');

    }

    function reportChange(){
        return view('report');
    }

    function patientUpdateReport(Request $request){
        $current_user = Auth::user();
        $user = Patient::where('email', $current_user->email)->first();
        $user->report = $request->file('report')->getClientOriginalName();
        $user->save();
        $request->file('report')->move('uploads/',$user->report);
        return redirect(route('patientprofile'))->with('success', 'Report Updated!');

    }


}
