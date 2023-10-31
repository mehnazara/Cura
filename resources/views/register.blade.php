@extends('layout')
@section('title','Register')

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
    <form
action="{{route('register.post')}}" method="POST"
style="background-color:#ccec6dac; 
margin:35px;
padding:20px;
border-radius:20px;
box-shadow:10px 10px rgba(71, 114, 31, 0.566);">
    @csrf 
    <div class="form-group">
        <label for="name">Patient Name</label>
        <input type="text" class="form-control shadow" name="name" aria-describedby="name" placeholder="Enter patient's name" value="{{old('name')}}">
        <span style="font-weight: bolder;
        color:rgb(102, 4, 4)">
          @error('name')
          {{$message}}
          @enderror
        </span>
    </div>
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control shadow" name="phone" aria-describedby="phone" placeholder="Enter phone number" value="{{old('phone')}}">
        <span style="font-weight: bolder;
        color:rgb(102, 4, 4)">
          @error('phone')
          {{$message}}
          @enderror
        </span>
      </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control shadow" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('email')
        {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control shadow" name="password" placeholder="Password" value="{{old('password')}}">
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('password')
        {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-group">
        <label for="birth-date">Birth Date</label>
        <input type="date" class="form-control shadow" name="birthdate" aria-describedby="date" placeholder="Enter date of birth" value="{{old('birthdate')}}">
        <span style="font-weight: bolder;
        color:rgb(102, 4, 4)">
          @error('birthdate')
          {{$message}}
          @enderror
        </span>
    </div>
    <div class="form-group">
        <label for="gender">Select Gender</label>
        <select class="form-control shadow" name="gender">
          <option>Male</option>
          <option>Female</option>
        </select>
    </div>
    <div class="text-center">
        <div class="box shadow mb-2" style="border-radius: 80px;" >
          <a class="nav-link text-dark" href="{{url('/login')}}" >Already have an account? Login.</a>
        </div>
        <button type="submit" class="btn btn-success shadow">Submit</button>
    </div>
  </form>
  </div>
</div>

@endsection
    
