@extends('layout')

@section('title','Nurse Profiles')
@section('content')
<div class="container">
    <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
        <h2 style="margin: 12px;">Care-Givers</h2>
        
    </div>
    <hr style="border-color:rgba(250, 235, 215, 0.309);">
    <div class="row" style="justify-content: center; color:rgb(93, 57, 8);font-weight:bold; margin-top:20px;">

    
        
        @foreach ($nurses as $nurse )

        <div class="card" style="width: 18rem; margin:10px;background-color: #4a7951c9;">
            <img class="card-img-top" src="{{URL::asset("uploads/".$nurse->photo)}}" alt="Card image cap">
            <div class="card-body" style="color: #f1eec6;">
              <h5 class="card-title">{{$nurse->name}}</h5>
              <div class="div">
                <button style="border-radius: 10px;padding:6px;
                background-color:bisque;color:#012d1ddd;font-weight:bold;"
                type="button" data-toggle="modal" data-target="#modal-{{$nurse->nurse_id}}">
                View Details</button>
                <a href="#">
                  <button type="button" style="border-radius: 10px;padding:6px;
                  background-color:#012d1ddd;color:bisque;" >Book Nurse</button>
                </a>
              </div>
              
            </div>
          </div>

          <div class="modal fade" id="modal-{{$nurse->nurse_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content" style="background-color: #bcb88af1;">

                <div class="modal-header" style="color: rgb(78, 46, 7); font-weight:bold;">
                  
                  @if ($nurse->gender === 'female')
                  <img src="{{URL::asset("images/female.png")}}" width="50px" height="30px">
                  @else
                  <img src="{{URL::asset("images/male.png")}}" width="50px" height="30px">
                  @endif
                  <h5 class="modal-title" id="exampleModalLongTitle">{{$nurse->name}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body" style="margin-left: 15px;color: rgb(72, 43, 7);">
                    <div class="row">
                        Graduated from: {{$nurse->qualifications}}
                    </div>
                    <div class="row">
                        Gender: {{$nurse->gender}} nurse.
                    </div>
                    <div class="row">
                        Age: {{$nurse->age}} years old.
                    </div>
                        @php
                        $types = json_decode($nurse->nursing_types);
                        @endphp
                        <div class="row" style="color:black;font-weight:bolder;margin-top:25px;">
                          <h5><u>Associated With - </u></h5>
                        </div>
                        

                        @foreach ($types as $type )
                        <div class="row">
                          <span>{{$type}}</span>
                        </div>
                        
                
                        @endforeach
                  
                  
                </div>
              </div>
            </div>
          </div>
            
        @endforeach
    </div>
</div>
@endsection