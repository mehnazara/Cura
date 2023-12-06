@extends('layout')
@section('title','Create Nurse Profile')

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
action="{{route('create.post')}}" method="POST" enctype="multipart/form-data"
style="background-color:#ccec6dac; 
margin:35px;
padding:20px;
border-radius:20px;
box-shadow:10px 10px rgba(71, 114, 31, 0.566);">
    @csrf 
    <div class="form-group">
        <label for="name">Nurse Name</label>
        <input type="text" class="form-control shadow" name="name" aria-describedby="name" placeholder="Enter Nurse's name" value="{{old('name')}}">
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
      <label for="qualifications">Qualifications</label>
      <input type="qualifications" class="form-control shadow" name="qualifications" placeholder="qualifications" value="{{old('qualifications')}}">
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('qualifications')
        {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-group">
        <label for="gender">Select Gender</label>
        <select class="form-control shadow" name="gender">
          <option>Male</option>
          <option>Female</option>
          <option>Other</option>
        </select>
    </div>
    <div class="form-group">
      <label for="age">Age</label>
      <input type="age" class="form-control shadow" name="age" placeholder="Age" value="{{old('age')}}">
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('age')
        {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="nursing_types">Nursing Types</label>
      <input type="nursing_types" class="form-control shadow" name="nursing_types" placeholder="nursing_types" value="{{old('nursing_types')}}">
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('age')
        {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="photo">Nurse Photo</label>
      <input type="file" class="form-control" name="photo" value="{{old('photo')}}">
      <span style="font-weight: bolder; 
       color:rgb(102, 4, 4)">
        @error('photo')
        {{$message}}
        @enderror
      </span>
    </div>
   
    <div class="text-center">
        
        <button type="submit" class="btn btn-success shadow">Create Nurse Profile</button>
        @if(isset($message))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
    </div>
  </form>
  </div>
</div>

@endsection
    
