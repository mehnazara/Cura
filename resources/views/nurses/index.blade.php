@extends('layout')

@section('title','Nurses')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="mt-5 mb-3 text-white font-weight-bold">NURSES LIST</h1>
        <!-- <div class="card-deck"> -->
        <div class="card-deck" style="background-color:#355e354f;
            color:blanchedalmond; font-weight:bold;">
            @foreach($nurses as $nurse)
                <div class="card mb-3">
                    
                    <div class="card-body text-white" style="background-color: rgb(25, 86, 9); 
                                    color:antiquewhite;border-radius:10px;
                                    font-weight:bold;">
                        <h5 class="card-title">{{ $nurse->name }}</h5>
                        <p class="card-text">Phone Number: {{ $nurse->phone_number }}</p>
                        <p class="card-text">Age: {{ $nurse->age }}</p>
                        <!-- Add other fields as needed -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn" 
                                    style="background-color: rgb(25, 86, 9); 
                                    color:antiquewhite;border-radius:10px;
                                    font-weight:bold;">Book Nurse</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection


                                    