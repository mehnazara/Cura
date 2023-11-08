@extends('layout')

@section('title','Profile')
@section('content')
<div class="container">
    
    <div class="row justify-content-center" style="margin-top: 10px;">
        <div class="col-12">
            <div class="card" style="background-color:#355e3578;
            color:blanchedalmond; font-weight:bold;">
                <div class="card-header" style="font-size:25px; font-style:italic">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5>Name - {{auth()->user()->name}}</h5>
                        </div>
                        
                        <div class="col-6">
                            <form class="float-right" method="post">
                                @csrf
                                <label for="picture">Upload Profile Picture:</label>
                                <input type="file" name="picture" id="picture">
                                <div class="div text-center">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>
                                
                            </form>

                        </div>
                    

                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <h5>Email - {{auth()->user()->email}}</h5>
                        </div>
                        
                        <div class="col-6">
                            <form class="float-right" method="post">
                                @csrf
                                <label for="picture">Upload Medical Report:</label>
                                <input type="file" name="report">
                                <div class="div text-center">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>
                                
                            </form>

                        </div>
                    

                    </div>

                    

                    <hr>

                    @if(auth()->user()->phone == '')

                    <!-- Button to Update Information -->
                    <form action="{{route('profile.update')}}" method="post">
                        @csrf
                        <label for="number" style="font-size:21px">Provide a Phone Number</label>
                        <input type="email" name="email" placeholder="Email">
                        <input type="text" name="newphone" placeholder="New number">
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                        
                    @else
                    <div class="row">
                        <div class="col-6">
                            <h5>Phone Number - {{auth()->user()->phone}}</h5>
                        </div>
                        
                        <div class="col-6">
                            <form action="{{route('profile.update')}}" method="post">
                                @csrf
                                <label for="phone" style="font-size:21px">Change phone number--></label>
                                <input type="text" name="phone" placeholder="Old number">
                                <input type="text" name="newphone" placeholder="New number">
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>

                        </div>
                    

                    </div>
                    
                    @endif


                    <hr>

                    <!-- Button to View Assigned Nurse -->
                    <a href="#" class="btn btn-success">View Assigned Nurse</a>

                    <hr>

                    <!-- Button to View Due Balance -->
                    <a href="#" class="btn btn-success">View Due Balance</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection