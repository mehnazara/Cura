@extends('layout')

@section('title','Admin Dashboard')
@section('content')
<div class="container">
    
    <div class="row justify-content-center" style="margin: 30px;">
        <div class="col-12">
            <div class="card" style="background-color:#355e354f; color:blanchedalmond; font-weight:bold;">
                <div class="card-header" style="font-size:25px; font-style:italic">Admin Dashboard</div>
                @auth('admin')
                <div class="card-body">
                    <hr>
                    <div class="row">
                        <div class="col-6 mt-3">
                            <h5>Admin Name - {{auth()->guard('admin')->user()->name}}</h5>
                        </div>
                        
                        
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <h5>Email - {{auth()->guard('admin')->user()->email}}</h5>
                        </div>

                        <div class="col-6 text-center">
                            <a href="#"
                                    class="btn" style="background-color: rgb(58, 112, 43); 
                                    color:antiquewhite;font-weight:bold;
                                    border-radius:20px;">Random Button
                            </a>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        
                        <div class="col-6 text-center">
                            <a href="#"
                                    class="btn" style="background-color: rgb(58, 112, 43); 
                                    color:antiquewhite;font-weight:bold;
                                    border-radius:20px;">Another button
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
