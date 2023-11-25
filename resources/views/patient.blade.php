@extends('layout')

@section('title','Profile')
@section('content')
<div class="container">
    
    <div class="row justify-content-center" style="margin: 10px;">
        <div class="col-12">
            <div class="card" style="background-color:#355e354f;
            color:blanchedalmond; font-weight:bold;">
                <div class="card-header" style="font-size:25px; font-style:italic">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <h5>Name - {{auth()->user()->name}}</h5>
                        </div>
                        
                        @if(auth()->user()->profilePicture == '')
                        <div class="col-6 text-center">
                            <form action="{{route('profile.update')}}" class="float-right" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="picture">Upload Profile Picture:</label>
                                <input type="file" name="picture" id="picture">
                                <div class="div">
                                    <button type="submit" class="btn" 
                                    style="background-color: rgb(25, 86, 9); 
                                    color:antiquewhite;border-radius:10px;
                                    font-weight:bold;" >Upload</button>
                                </div>
                                
                            </form>

                        </div>
                        @else
                        <div class="col-6 text-center">
                            <div class="row" style="justify-content: center">
                                <img src="{{URL::asset("uploads/".auth()->user()->profilePicture)}}" style="border-radius:10px;" width="200px">

                            </div>
                            <div class="row mt-2" style="justify-content: center;">
                                <a href="{{route('patient.image')}}" class="btn" 
                                style="background-color: rgb(30, 95, 12); color:antiquewhite;
                                border-radius:10px;font-weight:bold;">Change Image</a>
                            </div>

                        </div>
                        @endif
                    

                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <h5>Email - {{auth()->user()->email}}</h5>
                        </div>
                        @if (auth()->user()->report == '')
                            
                        
                        <div class="col-6 text-center">
                            <form action="{{route('profile.update')}}" class="float-right" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="report">Upload Medical Report:</label>
                                <input type="file" name="report">
                                <div class="div">
                                    <button type="submit" class="btn"
                                    style="background-color: rgb(28, 83, 12); 
                                    color:antiquewhite;border-radius:10px;
                                    font-weight:bold;">Upload</button>
                                </div>
                                
                            </form>

                        </div>
                        @else
                        <div class="row" style="margin-left:170px;">
                            <a href="{{route('patient.report')}}" class="btn"
                            style="background-color: rgba(80, 127, 67, 0.515); 
                            color:antiquewhite;font-weight:bold;
                            border-radius:20px;">View Medical Report</a>
    
                        </div>
                        @endif
                    

                    </div>

                    

                    <hr>

                    @if(auth()->user()->phone == '')

                    <!-- Button to Update Information -->
                    <form action="{{route('profile.update')}}" method="post">
                        @csrf
                        <label for="number" style="font-size:21px">Provide a Phone Number--> </label>
                        <input type="text" name="newphone" placeholder="New number">
                        <button type="submit" class="btn"
                        style="background-color: rgb(33, 79, 10); 
                        color:antiquewhite;border-radius:10px;
                        font-weight:bold;">Add</button>
                    </form>
                        
                    @else
                    <div class="row">
                        <div class="col-6">
                            <h5>Phone Number - {{auth()->user()->phone}}</h5>
                        </div>
                        
                        <div class="col-6 text-center">
                            <form action="{{route('profile.update')}}" method="post">
                                @csrf
                                <label for="phone" style="font-size:21px">Change phone number--></label>
                                <input type="text" name="newphone" placeholder="New number">
                                <button type="submit" class="btn"
                                style="background-color: rgb(28, 68, 8); 
                                color:antiquewhite;border-radius:10px;
                                font-weight:bold;">Change</button>
                            </form>

                        </div>
                    

                    </div>
                    
                    @endif


                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection