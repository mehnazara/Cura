@extends('layout')
@section('title','Login')

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
    <form action="{{route('login.post')}}" method="POST" 
style="background-color:#8a9a5b; 
margin:15px;
padding:20px;
border-radius:20px;
box-shadow:10px 10px rgba(64, 103, 28, 0.542);">
    @csrf
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control shadow" name="email" placeholder="Enter email" value="{{old('email')}}">
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('email')
        {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
        <a class="float-right" style="color: rgb(8, 44, 6)" href="{{route('password.forgot')}}">Forgot Password?</a>
      
      <input type="password" class="form-control shadow" name="password" placeholder="Password" value="{{old('password')}}">
      
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('password')
        {{$message}}
        @enderror
      </span>
    </div>
    <div class="text-center">
      <div class="box shadow mt-2 mb-2" style="border-radius: 80px;" >
        <a class="nav-link text-dark" href="{{url('/register')}}" >New user? Register here.</a>
      </div>
        <button type="submit" class="btn btn-success shadow">Submit</button>
    </div>
  </form>
  </div>
</div>

@endsection
