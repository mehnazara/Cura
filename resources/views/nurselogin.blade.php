@extends('layout')
@section('title','Nurse Login')

@section('content')
<div class="row" style="justify-content: center">
  <div class="box" 
  style="background-color: rgba(131, 105, 66, 0.285);
  margin:20px;
  border-radius:20px">
    <img src="{{URL::asset('/images/logo.png')}}" class="img-fluid" alt="Responsive image" 
  style="height:130px; padding:10px">

  </div>
  
</div>
<div class="row" style="justify-content: center">
  <div class="col-5">
    <form action="{{route('nurselogin.post')}}" method="POST" 
style="background-color:#8a9a5b; 
margin:15px;
padding:15px;
border-radius:20px;
box-shadow:10px 10px rgba(64, 103, 28, 0.542);">
    @csrf
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control shadow" name="email" placeholder="Enter email">
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('email')
        {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      
      <input type="password" class="form-control shadow" name="password" placeholder="Password" >
      
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('password')
        {{$message}}
        @enderror
      </span>
    </div>
    
    <div class="text-center">
        <button type="submit" class="btn btn-success shadow">Submit</button>
    </div>
  </form>
  </div>
</div>

@endsection
