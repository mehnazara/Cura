<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\Nurse;
use App\Models\Review;
use App\Models\Patient;
use App\Models\Nurse_User;
use App\Models\Service;
use App\Models\Inservice;
use App\Models\Pending;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use Stripe;


class NurseController extends Controller
{
    // Other methods...
    function nlogin(){
        if(Auth::guard('nurse')->check()){
            return view('nursedashboard');
        }
        return view('nurselogin');
    }

    function nloginpost (Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        //dd($credentials);
        if(Auth::guard('nurse')->attempt($credentials)){
            return view('nursedashboard')->with('success', 'Nurse Login successful!');
        }
        return redirect(route('nurselogin'))->with('error', 'Nurse Login details are not valid!');
    }


    function nlogout(){
        Session::flush();
        Auth::guard('nurse')->logout();
        return redirect(route('nurselogin'))->with('success','Nurse Logout successful!');
    }
    //-----------------------------------------------From patient side-------------------------------------------------------
    

    public function profiles(){
        $nurses = Nurse::all();
        return view('/nurse/allprofiles', compact('nurses'));
    }
    
    
    public function pickType($nurse_id) {

        $nurse = Nurse::find($nurse_id);
        $types = json_decode($nurse->nursing_types);
        $services = [];
        foreach($types as $type){
            $temp = Service::where('name',$type)->first();
            $services[] = $temp;


        }

        return view('/nurse/booked_nurses',compact('services','nurse'));
        
    }

    public function pickSlot($nurse_id, $name){

        $nurse = Nurse::find($nurse_id);
        $service = Service::where('name',$name)->first();

        $commitments = Inservice::where('nurse_id',$nurse_id)->get();
        
        $sortedCommitments = $commitments->sortBy('service_start');
        $bookings = [];
        foreach($sortedCommitments as $single){
            if($single->status === 'Active'){
                $bookings[] = $single;

            }
        }
         
        if(count($bookings) != 0){

            $today = Carbon::now();
            $schedule = [];
            $schedule[] = date('F', strtotime($today));
            $booked_days_in_months = [];
            $booked_days_in_months[] = [date('F', strtotime($today)) => []];
            for($i = 0;$i < 5;$i++){
                $today = $today->addMonth();
                $schedule[] = date('F', strtotime($today));
                $booked_days_in_months[] = [date('F', strtotime($today)) => []];

            }
            
            
            foreach($bookings as $one){
                for($y = 0;$y < 5;$y++){
                    $actual_month = date('F', strtotime($one->service_start));
                    if(isset($booked_days_in_months[$y][$actual_month])){
                        $booked_days_in_months[$y][$actual_month][] = $one;
                        

                    }
                }
            }
            $state = 1;

            //return $booked_days_in_months;
            return view('/nurse/pickSchedule',compact('name','nurse','schedule','booked_days_in_months','state','service'));

            

            

        } else {
            $today = Carbon::now();
            $schedule = [];
            $schedule[] = date('F', strtotime($today));
            for($i = 0;$i < 5;$i++){
                $today = $today->addMonth();
                $schedule[] = date('F', strtotime($today));

            }
            $state = 0;
            return view('/nurse/pickSchedule',compact('name','nurse','schedule','state','service'));
        }

        
    }

    public function confirmBooking(Request $request,$nurse_id, $name){
        $request->validate([
            'service_start' => 'required',
            'service_end' => 'required'
        ]);

        if($request->payment_method === "Cash After Service"){

            $patient = Auth::user();
            $service = Service::where('name',$name)->first(); 

            $data['patient_id'] = $patient->patient_id;
            $data['nurse_id'] = $nurse_id;
            $data['service_type'] = $request->service_type;
            $data['service_start'] = $request->service_start;
            $data['service_end'] = $request->service_end;

            $amount = 0;
            $start = Carbon::parse($request->service_start);
            $end = Carbon::parse($request->service_end);

            $no_of_days = $end->diff($start)->days;

            $amount = ($service->cost/30) * $no_of_days;
            $data['amount'] = $amount;

            $data['status'] = $request->status;
            $data['payment_method'] = $request->payment_method; 
            $new_service = Inservice::create($data);
            if (!$new_service){
                return redirect(route('nurse.profiles'))->with('error', 'Booking Failed! Please try again.');
            }
    
            return redirect(route('home'))->with('success', 'Successfully booked a nurse!');

        } else {

            $patient = Auth::user();
            $service = Service::where('name',$name)->first(); 

            $data['patient_id'] = $patient->patient_id;
            $data['nurse_id'] = $nurse_id;
            $data['service_type'] = $request->service_type;
            $data['service_start'] = $request->service_start;
            $data['service_end'] = $request->service_end;

            $amount = 0;
            $start = Carbon::parse($request->service_start);
            $end = Carbon::parse($request->service_end);

            $no_of_days = $end->diff($start)->days;

            $amount = ($service->cost/30) * $no_of_days;
            $data['amount'] = $amount;
            $data['payment_status'] = 'Incomplete';
            $new_payment = Pending::create($data);

            $amount = intval($new_payment->amount);

            $temp = [$new_payment,$amount];
            $data = json_encode($temp);

            

            return redirect(url('/paymentStripe/'.$data));
        }
        
    }

    public function proceedToPay($data){
        return view('/nurse/paymentStripe',compact('data'));

    }

    public function makePay(Request $request,$data){

        //return $request;

        $raw_data = json_decode($data);
        $amount = $raw_data[1];
        $payment = $raw_data[0];

        $nurse = Nurse::find($payment->nurse_id);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => "Payment of $nurse->name for $payment->service_type." 
        ]);


        $info['patient_id'] = $payment->patient_id;
        $info['nurse_id'] = $payment->nurse_id;
        $info['service_type'] = $payment->service_type;
        $info['service_start'] = $payment->service_start;
        $info['service_end'] = $payment->service_end;
        $info['amount'] = $amount;

        $info['status'] = 'Active';
        $info['payment_method'] = 'Prepaid Online'; 
        $new_service = Inservice::create($info);

        $temp = Pending::where('payment_id', $payment->payment_id)->first();
        $temp->payment_status = 'Success';
        $temp->save();
        
        Session::flash('success', 'Payment successful!');
              
        return redirect(route('home'));

    }
    
 
}
