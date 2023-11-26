<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Nurse;
use App\Models\Nurse_User;
use App\Models\Patient;

class NurseDashboard extends Controller
{
    function nurse_dash(){
        return view('/nursedashboard');
        
    }

    function nurse_schedule(){
        // if(Auth::guard('nurse')->check()){
        
        // }
        return view('/nurse_schedule');
    }

    function nurse_prev(){
        $authenticatedNurse = Auth::guard('nurse')->user();
        $servedPatients = json_decode($authenticatedNurse->served_patients);
        //$servedPatients = Nurse::pluck('served_patients')->toArray();
        //return $servedPatients;

        $list =[];
        foreach($servedPatients as $prev){
            $data = Patient::find($prev);
            //return $data;
            $list[]=$data;
    
        }
        //return $list;
        return view('/nurse_prev_client',compact('list'));
        
    }

    function nurse_now(){
        $authenticatedNurse = Auth::guard('nurse')->user();
        $currentPatients = json_decode($authenticatedNurse->current_patient);
        
        $list =[];
        foreach($currentPatients as $now){
            $data = Patient::find($now);
            //return $data;
            $list1[]=$data;
    
        }
        //return $list;
        return view('/nurse_now_client',compact('list1'));
        
    }

   
    function nurse_balance(){
        return view('/nurse_balance');
    }

}



















//     function updateProfile(Request $request){

//         if ($request->newphone){
//             $current_user = Auth::user();
//             if($current_user->phone){
            
//                 $user = Patient::where('phone', $current_user->phone)->first();
//                 $user->phone = $request->newphone;
//                 $user->save();
//                 return redirect(route('patientprofile'))->with('success', 'Phone Number Changed!');

//             } else {
//                 $user = Patient::where('email', $current_user->email)->first();
//                 $user->phone = $request->newphone;
//                 $user->save();
//                 return redirect(route('patientprofile'))->with('success', 'Phone Number Added!');
//             } 

//         } elseif ($request->picture){
//             $current_user = Auth::user();
//             $user = Patient::where('email', $current_user->email)->first();
//             $user->profilePicture = $request->file('picture')->getClientOriginalName();
//             $user->save();
//             $request->file('picture')->move('uploads/',$user->profilePicture);
//             return redirect(route('patientprofile'))->with('success', 'Profile Picture Added!');
//         } else {
//             $current_user = Auth::user();
//             $user = Patient::where('email', $current_user->email)->first();
//             $user->report = $request->file('report')->getClientOriginalName();
//             $user->save();
//             $request->file('report')->move('uploads/',$user->report);
//             return redirect(route('patientprofile'))->with('success', 'Report Uploaded Successfully!');

//         }
        



        

//     }

//     function imageChange(){
//         return view('imageChange');
//     }

//     function patientUpdateImage(Request $request){
//         $current_user = Auth::user();
//         $user = Patient::where('email', $current_user->email)->first();
//         $user->profilePicture = $request->file('picture')->getClientOriginalName();
//         $user->save();
//         $request->file('picture')->move('uploads/',$user->profilePicture);
//         return redirect(route('patientprofile'))->with('success', 'Profile Picture Updated!');

//     }

//     function reportChange(){
//         return view('report');
//     }

//     function patientUpdateReport(Request $request){
//         $current_user = Auth::user();
//         $user = Patient::where('email', $current_user->email)->first();
//         $user->report = $request->file('report')->getClientOriginalName();
//         $user->save();
//         $request->file('report')->move('uploads/',$user->report);
//         return redirect(route('patientprofile'))->with('success', 'Report Updated!');

//     }


// }
