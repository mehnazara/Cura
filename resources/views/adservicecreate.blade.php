@extends('layout')
@section('title','Create Service')

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
action="{{route('createserv.post')}}" method="POST" enctype="multipart/form-data"
style="background-color:#ccec6dac; 
margin:35px;
padding:20px;
border-radius:20px;
box-shadow:10px 10px rgba(71, 114, 31, 0.566);">
    @csrf 
    <div class="form-group">
        <label for="name">Service Name</label>
        <input type="text" class="form-control shadow" name="name" aria-describedby="name" placeholder="Enter Service's name" value="{{old('name')}}">
        <span style="font-weight: bolder;
        color:rgb(102, 4, 4)">
          @error('name')
          {{$message}}
          @enderror
        </span>
    </div>
    
    <div class="form-group">
      <label for="description">Service description</label>
      <input type="description" class="form-control shadow" name="description" placeholder="description" value="{{old('description')}}">
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('description')
        {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="duration">Duration</label>
      <input type="duration" class="form-control shadow" name="duration" placeholder="duration" value="{{old('duration')}}">
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('duration')
        {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="cost">Cost</label>
      <input type="cost" class="form-control shadow" name="cost" placeholder="cost" value="{{old('cost')}}">
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('cost')
        {{$message}}
        @enderror
      </span>
    </div>

    <div class="form-group">
      <label for="associated_nurses">Associated Nurses</label>
      <input type="associated_nurses" class="form-control shadow" name="associated_nurses" placeholder="associated_nurses" value="{{old('associated_nurses')}}">
      <span style="font-weight: bolder;
      color:rgb(102, 4, 4)">
        @error('associated_nurses')
        {{$message}}
        @enderror
      </span>
    </div>
    <div class="form-group">
      <label for="image">Service Photo</label>
      <input type="file" class="form-control" name="image" value="{{old('image')}}">
      <span style="font-weight: bolder; 
       color:rgb(102, 4, 4)">
        @error('image')
        {{$message}}
        @enderror
      </span>
    </div>
   
    <div class="text-center">
        
        <button type="submit" class="btn btn-success shadow">Create Service</button>
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
    