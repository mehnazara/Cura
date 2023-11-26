@extends('layout')

@section('title','Nurse Profile')
@section('content')
<div class="container">
    
    <div class="row justify-content-center" style="margin: 30px;">
        <div class="col-12">
            <div class="card" style="background-color:#355e354f; color:blanchedalmond; font-weight:bold;">
                <div class="card-header" style="font-size:25px; font-style:italic">Nurse Dashboard</div>
                @auth('nurse')
                <div class="card-body">
                    <hr>
                    <div class="row">
                        <div class="col-6 mt-3">
                            <h5>Nurse Name - {{auth()->guard('nurse')->user()->name}}</h5>
                        </div>
                        
                        <div class="col-6 text-center">
                            <a href="{{route('routine')}}"
                                class="btn" style="background-color: rgb(58, 112, 43); 
                                color:antiquewhite;font-weight:bold;
                                border-radius:20px;">View Your Schedule
                            </a>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <h5>Email - {{auth()->guard('nurse')->user()->email}}</h5>
                        </div>

                        <div class="col-6 text-center">
                            <a href="{{route('past')}}"
                                    class="btn" style="background-color: rgb(58, 112, 43); 
                                    color:antiquewhite;font-weight:bold;
                                    border-radius:20px;">View Previous Patients
                            </a>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <h5>Phone Number - {{auth()->guard('nurse')->user()->phone}}</h5>
                        </div>
                        
                        <div class="col-6 text-center">
                            <a href="{{route('current')}}"
                                    class="btn" style="background-color: rgb(58, 112, 43); 
                                    color:antiquewhite;font-weight:bold;
                                    border-radius:20px;">View Current Patients
                            </a>
                        </div>
                    </div>

                    <hr>

                @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
