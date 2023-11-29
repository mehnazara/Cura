@extends('layout')

@section('title','Transaction History')
@section('content')
<div class="container">
    <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
        <h2 style="margin: 12px;">Transaction List of {{$data[0]->name}}</h2>
        
    </div>
    <hr style="border-color:rgba(250, 235, 215, 0.309);">
    <div class="row" style="color: blanchedalmond;font-weight:bold;">
        <div class="col">
            <h4>Transaction No</h4>
        </div>
        <div class="col">
            <h4>Nurse Name</h4>
        </div>
        <div class="col">
            <h4>Service Type</h4>
        </div>
        <div class="col">
            <h4>Amount</h4>
        </div>
        <div class="col">
            <h4>Payment Method</h4>
        </div>
    </div>
    <hr style="border-color:rgba(250, 235, 215, 0.484);">

    @foreach ($data[1] as $transaction )
    <div class="row" style="color: rgb(238, 235, 227);font-weight:bold;justify-content:center;">
        <div class="col" style="margin-left: 60px;">
            <h5>{{$transaction['No.']}}</h5>
        </div>
        <div class="col" style="margin-left:-50px;">
            <h5>{{$transaction['name']}}</h5>
        </div>
        <div class="col">
            <h6>{{$transaction['service_type']}}</h6>
        </div>
        <div class="col">
            <h5>{{$transaction['amount']}} BDT</h5>
        </div>
        <div class="col">
                
            @if ($transaction['status']=== 'Prepaid Online')
            <span>Prepaid
            <img style="color:whitesmoke;" src="{{URL::asset("images/prepaid.png")}}" width="50px" height="50px">
            </span>

            @else
            <span>After Service
            <img style="color:whitesmoke;" src="{{URL::asset("images/afterservice.png")}}" width="70px" height="50px">
            </span>
            

                
            @endif
            
        </div>
    </div>
    <hr style="border-color:rgba(250, 235, 215, 0.484);">
        
    @endforeach

    
    
</div>
@endsection