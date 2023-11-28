<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    function home(){
        return view('home');
    }

    function userType(){
        return view('divider/userType');
    }
}
