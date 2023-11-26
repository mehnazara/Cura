@extends('layout')
@section('title','Online Payment')

@section('content')
<div class="container">

    <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
        <h2 style="margin: 10px;">Complete Payment</h2>
    </div>
    <hr style="border-color:rgba(250, 235, 215, 0.581);">

    <div class="row" style="justify-content: center;">
        <div class="col-8">
            <div class="panel panel-default credit-card-box text-center" 
            style="background-color: rgba(64, 37, 4, 0.514);
            color:rgb(193, 170, 138);font-weight:bolder;margin:20px;padding:20px;">
                <div class="panel-heading display-table" >
                        <h3 class="panel-title" >Payment Details</h3>
                </div>
                <hr style="border-color:rgba(209, 177, 136, 0.447)309);">
                <div class="panel-body">
    
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
    
                    <form 
                            role="form"  
                            action="{{url('/paymentStripe')}}/{{$data}}"
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf
    
                        <div class='form-row row'>
                            <div class='col-6 form-group required'>
                                <label style="margin-left:-180px;" class='control-label'>Name on Card</label> <input
                                    class='form-control' size='5' type='text' placeholder="Patient Name">
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-10 form-group required'>
                                <label style="margin-left:-410px;" class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text' placeholder="eg. XXXX XXXX XXXX XXXX">
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
    
                        <hr style="border-color:rgba(209, 176, 132, 0.409);">
                        <div class="row" style="justify-content:center;">

                            @php
                                $temp = json_decode($data);
                                $bill = $temp[1];
                            @endphp
                            
                            <button type="submit" style="border-radius: 10px;padding:10px;
                            background-color:#dec387dd;color:rgb(75, 43, 4);
                            margin-right:20px;font-weight:bolder;">Pay {{$bill}} BDT</button>
                        </div>
                            
                    </form>
                </div>
            </div>        
        </div>
    </div>



</div>


    

@endsection
