<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientDashboard extends Controller
{
    function profile(){
        return view('patient');
    }
}
