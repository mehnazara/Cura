@extends('layout')

@section('title','Assigned Nurses')
@section('content')
<div class="container">
        
        @php
            $data = json_decode($data);
            $service_name = $data[0];
            unset($data[0]);
        @endphp

           <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
            <h2 style="margin: 12px;">{{$service_name}} Members</h2>
            
        </div>
        <hr style="border-color:rgba(250, 235, 215, 0.309);">
        <div class="row" style="justify-content: center;">
            @foreach ($data as $nurse)

            <div class="jumbotron shadow" style="background-color: rgba(121, 140, 77, 0.547);border-radius:150px;
            color:rgb(239, 194, 142);font-weight:bold;">
                <div class="row">
                  @if ($nurse->gender === 'female')
                  <img src="{{URL::asset("images/female.png")}}" width="150px" height="100px">
                  @else
                  <img src="{{URL::asset("images/male.png")}}" width="150px" height="100px">
                  @endif
                <h4 class="display-4">{{$nurse->name}}</h4>

                </div>
                

                <hr class="my-4 shadow" style="border-color: rgb(69, 40, 4);">
                <p>This nurse specialises in {{$service_name}} and has proven to be consistently well-performing in the field.</p>
                <div class="row" style="justify-content: center;">
                    <h5>Graduated from: {{$nurse->qualifications}}</h5>
                </div>
                <div class="row" style="justify-content: center;">
                    <h5>Gender: {{$nurse->gender}} nurse.</h5>
                </div>
                <div class="row" style="justify-content: center;">
                    <h5>Age: {{$nurse->age}} years old.</h5>
                </div>
                <div class="row" style="justify-content: center;margin:25px;">
                    <p class="lead" >
                        <a class="btn shadow" href="#" role="button" 
                        style="background-color: rgba(78, 43, 6, 0.845);
                        color:rgb(217, 184, 136);border-radius:20px;">Book Nurse</a>
                      </p>
                </div>
                
              </div>
                
            @endforeach
        </div>
               
</div>
@endsection