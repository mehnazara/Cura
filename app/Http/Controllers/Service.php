<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Service extends Controller
{
    function serviceList(){
        return view('service');
    }
}
