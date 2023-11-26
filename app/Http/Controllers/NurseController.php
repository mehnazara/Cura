<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Nurse;
use App\Models\Review;
use App\Models\Patient;
use App\Models\Nurse_User;
use Illuminate\Support\Facades\Auth;


class NurseController extends Controller
{
    // Other methods...
    function nlogin(){
        if(Auth::guard('nurse')->check()){
            return view('nursedashboard');
        }
        return view('nurselogin');
    }

    function nloginpost (Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        //dd($credentials);
        if(Auth::guard('nurse')->attempt($credentials)){
            return view('nursedashboard')->with('success', 'Nurse Login successful!');
        }
        return redirect(route('nurselogin'))->with('error', 'Nurse Login details are not valid!');
    }


    function nlogout(){
        Session::flush();
        Auth::guard('nurse')->logout();
        return redirect(route('nurselogin'))->with('success','Nurse Logout successful!');
    }
    //-----------------------------------------------From patient side-------------------------------------------------------
    

    public function profiles(){
        $nurses = Nurse::all();
        return view('/nurse/allprofiles', compact('nurses'));
    }
    public function bookNurse($nurse_id) {

        $patient = Auth::guard('web')->user();           //is guard correct here??
        
        $patient = Patient::find($patient->patient_id);
        $nurse = Nurse::find($nurse_id);
    


        $data = json_decode($patient->nurses);

        $booked_nurses = [];
        foreach($data as $booked){
            $one_nurse = Nurse::find($booked);
            $booked_nurses[] = $one_nurse;
        }
        $allnurses = [$booked_nurses,$nurse];
        return view('/booked_nurses',compact('allnurses'));
        //return $allnurses;
    }
    
 
}
