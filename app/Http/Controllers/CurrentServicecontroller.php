<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Service;
use App\Models\Nurse;
use App\Models\Patient;



class CurrentServicecontroller extends Controller
{
    function currentservices(){
        $patient = Auth::user();

        $data = json_decode($patient->nurses);
        //return $data;
        $nurse_details = [];
        $curr_service = [];
        $detail = [];
        foreach($data as $nurse_id){
            $nurse = Nurse::find($nurse_id);

            $assoc_service = json_decode($nurse->nursing_types);
            $curr_service[] = $assoc_service;

            $nurse_details[] = $nurse;


        }
        foreach($curr_service as $serv){
            foreach($serv as $nursetype){
                $serv_detail = Service::where('name', 'like', '%' . $nursetype . '%')->get();
                $detail[] = $serv_detail; 
            }



        }
        //return $detail;


        //return $nurse_details;
        return view('currentserv',compact('nurse_details','detail'));




    }


}
