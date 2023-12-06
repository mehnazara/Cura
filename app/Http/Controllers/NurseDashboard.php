<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Nurse;
use App\Models\Nurse_User;
use App\Models\Patient;
use App\Models\Comment;
use App\Models\Review;

use App\Models\Inservice;

class NurseDashboard extends Controller
{
    function nurse_dash(){
        return view('/nursedashboard');
        
    }

    function nurse_schedule(){
        $nurseId = Auth::guard('nurse')->id();
        //return($nurseId);
        // Get the current date
        $currentDate = Carbon::now();
        $startDate = $currentDate->copy()->subMonths(3);
        $endDate = $currentDate->copy()->addMonths(6);

        
        //$services = Inservice::where('nurse_id',$nurseId)->get();
       
        $services = Inservice::where('nurse_id', $nurseId)
            ->whereBetween('service_start', [$startDate, $endDate])->get();
        //return($services);

        // Calculate the total service time
        
        $patientList = [];
        foreach ($services as $service) {
            $totalServiceMinutes = 0;
            $remainServiceMinutes = 0;
            $serviceStart = Carbon::parse($service->service_start);
            $serviceEnd = Carbon::parse($service->service_end);

            $formattedServiceStart = $serviceStart->format('jS F Y');
            $formattedServiceEnd = $serviceEnd->format('jS F Y');

            // Calculate the difference in minutes
            $serviceDuration = $serviceEnd->diffInMinutes($serviceStart);

            // Add the service duration to the total
            $totalServiceMinutes += $serviceDuration;

            // Convert total minutes to hours and minutes
            $totalServiceMonths = floor($totalServiceMinutes / (60 * 24 * 30));
            $remainingMinutes = $totalServiceMinutes % (60 * 24 * 30);

            $totalServiceDays = floor($remainingMinutes / (60 * 24));
            $remainingMinutes = $remainingMinutes % (60 * 24);

            //------------------------------------------------------------
            $remainDuration = $serviceEnd->diffInMinutes($currentDate);
            $remainServiceMinutes += $remainDuration;
            $remainServiceMonths = floor($remainServiceMinutes / (60 * 24 * 30));
            $remainMinutes = $remainServiceMinutes % (60 * 24 * 30);
            $remainServiceDays = floor($remainMinutes / (60 * 24));
            // $totalServiceHours = floor($remainingMinutes / 60);
            // $totalServiceMinutes = $remainingMinutes % 60;



            $patientList[] = [
                'patient_id' => $service->patient_id,
                'service_start' => $formattedServiceStart,
                'service_end' => $formattedServiceEnd,
                'total_service_months' => $totalServiceMonths,
                'total_service_days' => $totalServiceDays,
                'remain_service_months' => $remainServiceMonths,
                'remain_service_days' => $remainServiceDays,
                // 'total_service_hours' => $totalServiceHours,
                // 'total_service_minutes' => $totalServiceMinutes,
            ];
            
        
           // echo "Patient ID: {$service->patient_id}, Service start: {$serviceStart} to {$serviceEnd}.\n Service Duration: {$totalServiceDays} days {$totalServiceHours} hours {$totalServiceMinutes} minutes\n";
        }

        //return($patientList);

        //return "Total Service Time: {$totalServiceHours} hours and {$totalServiceMinutes} minutes";
    
        return view('/nurse_schedule', ['patientList' => $patientList]);
    }

    function nurse_prev(){
        $authenticatedNurse = Auth::guard('nurse')->user();
        //return($authenticatedNurse);

        // Use the nurse_id and servedPatientsArray in your query
        $servedPatients = Inservice::where('nurse_id', $authenticatedNurse->nurse_id)
            ->where('status', 'Completed')
            ->pluck('patient_id')
            ->toArray();
        //$servedPatients = json_decode($authenticatedNurse->served_patients);
        //$servedPatients = Nurse::pluck('served_patients')->toArray();
        //return $servedPatients;

        $list =[];
        

        foreach($servedPatients as $prev){
            $data = Patient::find($prev);
            //return $data;
            //$list[]=$data;
            $cmts = Comment::where('patient_id', $prev)->first();
            //$list[] = $cmts;

            $list[] = [
                'patient_data' => $data,
                'comments' => $cmts,
            ];
        }

        //return($list);
        

        //return $list;
        return view('/nurse_prev_client',compact('list'));
        
    }

    function nurse_now(){
        $authenticatedNurse = Auth::guard('nurse')->user();
        //return($authenticatedNurse);

        // Use the nurse_id and servedPatientsArray in your query
        $currentPatients = Inservice::where('nurse_id', $authenticatedNurse->nurse_id)
            ->where('status', 'Active')
            ->pluck('patient_id')
            ->toArray();
        
        $list1 =[];
        foreach($currentPatients as $now){
            $data = Patient::find($now);
            //return $data;
            $list1[]=$data;
    
        }
        //return $list1;
        return view('/nurse_now_client',compact('list1'));
        
    }

   
    function nurse_balance(){
        $authenticatedNurse = Auth::guard('nurse')->user();
        $inserviceData = Inservice::where('nurse_id', $authenticatedNurse->nurse_id)->get();
        $inserviceList = $inserviceData->toArray();

        //return($inserviceList);
        return view('/nurse_balance',compact('inserviceList'));

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
