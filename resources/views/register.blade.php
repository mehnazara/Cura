@extends('layout')
@section('title','Register')

@section('content')
<form
action="{{route('register.post')}}" method="POST"
style="background-color:#ccec6dac; 
margin:15px;
padding:20px;
border-radius:20px;
box-shadow:10px 10px rgb(17, 33, 2);">
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
        <button type="submit" class="btn btn-success shadow">Submit</button>
    </div>
  </form>
@endsection
    
