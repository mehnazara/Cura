<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Service;
use App\Models\Nurse;

class SearchController extends Controller
{
    function search(Request $request){
        
        $search = $request->search;
        return redirect(url('/search/'.$search));

        

    }

    function searchList($search){
        if($search){
            $services = Service::where('name', 'LIKE', "%$search%")->get();
            $nurses = Nurse::where('name', 'LIKE', "%$search%")->orwhere('qualifications', 'LIKE', "%$search%")->get();

            $data = [];
            $data[] = $services;
            $data[] = $nurses;
            //return compact('data');
            return view('/search/options', compact('data','search'));

        } else{
            $data = [[],[]];
            return view('/search/options', compact('data','search'));

        }
        
    }
}
