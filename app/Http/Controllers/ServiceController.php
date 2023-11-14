<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Service;
use App\Models\Nurse;

class ServiceController extends Controller
{
    function serviceList(){

        $services = Service::all();
        return view('service', compact('services'));
    }

    function showAssignedNurses($id){

        $service = Service::find($id);
        $nurses = json_decode($service->associated_nurses);
        $mixed = [$service->name];
        foreach ($nurses as $name){
            $current_nurse = Nurse::where('name', $name)->first();
            $mixed[] = $current_nurse;
        }

        $data = json_encode($mixed);


        

        return view('assignedNurse',compact('data'));

    }
}
