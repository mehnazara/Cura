<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Service;

class ServiceController extends Controller
{
    function serviceList(){

        $services = Service::all();
        return view('service', compact('services'));
    }
}
