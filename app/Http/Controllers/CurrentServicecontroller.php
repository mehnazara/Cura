<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Models\Service;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Inservice;
use Carbon\Carbon;

class CurrentServicecontroller extends Controller
{
    function currentservices(){
        $patient = Auth::user();

        $services = Inservice::where('status', 'Active')->where('patient_id', $patient->patient_id)->get();
        $nd = [];
        $sd = [];
        foreach ($services as $service) {
            $serviceStartDate = Carbon::parse($service->service_start);
            $serviceEndDate = Carbon::parse($service->service_end);

            $numberOfDays = $serviceEndDate->diffInDays($serviceStartDate);

            $serviceDetails = Service::where('name', $service->service_type)->first();
            $sd[] = ['services' => $serviceDetails,'start' => $serviceStartDate,'end' => $serviceEndDate,'numberOfDays' => $numberOfDays, 'nurse_id' => $service->nurse_id,
            ];
            //$sd[] = $numberOfDays;
            $nurseDetails = Nurse::find($service->nurse_id);
            $nd[] = $nurseDetails;
           
        }
       
        //return($services);
        return view('currentserv',compact('nd','sd','services'));




    }


}
