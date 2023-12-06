<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use App\Models\Inservice;
use App\Models\Admin_User;
use App\Models\Nurse;
use App\Models\Service;


class AdminDashboard extends Controller
{
    function admin_dash(){
        $nurses = Nurse::all();
        return view('admindashboard', compact('nurses'));
        
    }

    function view_nurses(Request $request){
        if($request->search){
            $nurses = Nurse::where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('email', 'like', '%' . $request->search . '%')
                        ->orWhere('phone', 'like', '%' . $request->search . '%')
                        ->get();
        } else {
            $nurses = Nurse::all();
        }

        return view('admindashboard', compact('nurses'));
    }

    public function show_patients_and_services()
    {
        

        $desiredNurseId = 1; 


        $inservices = Inservice::join('nurses', 'inservices.nurse_id', '=', 'nurses.nurse_id')
        ->where('status', "active")
        ->select('inservices.*', 'nurses.name as nurse_name', 'nurses.nursing_types as nursing_type', 'nurses.age as age')
        ->get();

        return view('show_patients_and_services', ['services' => $inservices]);
    }

    public function adnursecreate(){
        
        return view('adnursecreate');
    }

    public function nursecreatepost(Request $request){
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:nurses',
            'password' => 'required',
            'qualifications' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'nursing_types' => 'required',
            
        ]);
      
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['qualifications'] = $request->qualifications;
        $data['gender'] = $request->gender;
        $data['age'] = $request->age;
        $data['photo'] = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->move(public_path('uploads'), $data['photo']);

        
    

        $data['nursing_types'] = json_encode(explode(', ', $request->nursing_types));
        $nurse = Nurse::create($data);


        $message = 'Nurse creation successful!';
        $nomessage = 'Error, Problem in creating Nurse!';
        if (!$nurse){
            
            return view('/adnursecreate', compact('nomessage'));
        }
        
        $services = Service::all();

        foreach ($services as $service) {
        
            if (in_array($service->name, json_decode($nurse->nursing_types))) {
                $associatedNurses = json_decode($service->associated_nurses, true) ?? [];
                $associatedNurses[] = $nurse->name;
                $service->update(['associated_nurses' => json_encode($associatedNurses)]);
            }
        }
        

        $message = 'Nurse creation successful!';
        return view('/adnursecreate', compact('message'));
    
    }




    public function adservicecreate(){
        
        return view('adservicecreate');
    }

    public function servicecreatepost(Request $request){
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'cost' => 'required',
            'associated_nurses' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);
      
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['duration'] = $request->duration;
        $data['cost'] = $request->cost;
        $data['associated_nurses'] = json_encode(explode(', ', $request->associated_nurses));                  
        $data['image'] = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $data['image']);
        
        $service = Service::create($data);


        $message = 'Service creation successful!';
        $nomessage = 'Error, Problem in creating Service!';
        if (!$service){
            
            return view('/adservicecreate', compact('nomessage'));
        }
        $nurses = Nurse::all();

        foreach ($nurses as $nurse) {
        
            if (in_array($nurse->name, json_decode($service->associated_nurses))) {
                $associatedService = json_decode($nurse->nursing_types, true) ?? [];
                $associatedService[] = $service->name;
                $nurse->update(['nursing_types' => json_encode($associatedService)]);
            }
        }
        return view('/adservicecreate', compact('message'));
    
    }
}