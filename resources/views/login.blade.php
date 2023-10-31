@extends('layout')
@section('title','Login')

@section('content')
<form action="{{route('login.post')}}" method="POST" 
style="background-color:#8a9a5b; 
margin:15px;
padding:20px;
border-radius:20px;
box-shadow:10px 10px rgb(17, 33, 2);">
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
      <input type="password" class="form-control shadow" name="password" placeholder="Password" value="{{old('password')}}">
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
@endsection
