@extends('layout')
@section('title','Home')

@section('content')
<div class="container-fluid">
  @auth
  <div class="dropdown" style="margin: 5px; color:bisque;">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
      <img src="{{URL::asset('images/dropdown.png')}}" width="65px" height="65px">
    </button>
    <ul class="dropdown-menu" style="background-color: rgb(198, 201, 154);">
      <li><a class="dropdown-item" href="{{route('service')}}" style="font-weight: bold;
      color:rgb(68, 36, 4);">Services</a></li>
      <li><a class="dropdown-item" href="{{route('nurse.profiles')}}" style="font-weight: bold;
        color:rgb(68, 36, 4);">Nurse Profiles</a></li>
      <li><a class="dropdown-item" href="#" style="font-weight: bold;
        color:rgb(68, 36, 4);">Schedule</a></li>
    </ul>
  </div>
  @else
  <div class="dropdown" style="margin: 5px; color:bisque;">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
      <img src="{{URL::asset('images/dropdown.png')}}" width="65px" height="65px">
    </button>
    <ul class="dropdown-menu" style="background-color: rgb(198, 201, 154);">
      <li><a class="dropdown-item" href="{{route('service')}}" style="font-weight: bold;
      color:rgb(68, 36, 4);">Services</a></li>
      <li><a class="dropdown-item" href="#" style="font-weight: bold;
        color:rgb(68, 36, 4);">Nurse Profiles</a></li>
    </ul>
  </div>
    
  @endauth
  


  <div class="row" style="justify-content:center">
      <div class="box shadow-lg" 
    style="background-color: rgba(57, 36, 5, 0.23);
    margin:8px;
    border-radius:60px">
      <img src="{{URL::asset('/images/logo.png')}}" class="img-fluid" alt="Responsive image" 
    style="height:160px; padding:10px">

      </div>
  </div>
  <div class="row" style="justify-content: center">
      <div class="box shadow-lg" 
    style="background-color: rgba(74, 48, 10, 0.073);
    border-radius:10px;
    margin-top:20px;">
    <h2 style="color: rgb(215, 184, 143);
    font-style:italic;">"Quality Nursing At Your Doorstep."</h2>

      </div>
  </div>
</div>

@endsection
