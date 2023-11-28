<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Admin_User;


class AdminDashboard extends Controller
{
    function admin_dash(){
        return view('/admindashboard');
        
    }
}