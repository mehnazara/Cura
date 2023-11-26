@extends('layout')

@section('title','Nurse Booking')
@section('content')
<div class="container">
    <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
        <h2 style="margin: 10px;">Service Type</h2>
    </div>
    <hr style="border-color:rgba(250, 235, 215, 0.309);">
    <div class="row" style="justify-content: center; color:rgb(93, 57, 8);font-weight:bold; margin-top:20px;">

    
        
        @foreach ($services as $service )

        <div class="card shadow" style="width: 18rem; margin:10px;background-color: #4a7951c9;">
            <img class="card-img-top" src="{{URL::asset("uploads/".$service->image)}}" alt="Card image cap">
            <div class="card-body" style="color: #f1eec6;">
              <h5 class="card-title">{{$service->name}}</h5>
              <div class="div text-center">
                <a href="{{url('/slot_nurses/')}}/{{$nurse->nurse_id}}/{{$service->name}}"><button style="border-radius: 10px;padding:6px;
                background-color:#012d1ddd;color:bisque;"
                type="button">
                Pick Type</button></a>
              </div>
              
            </div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection



