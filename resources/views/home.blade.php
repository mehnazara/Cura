@extends('layout')
@section('title','Home')

@section('content')
<div class="container-fluid">
<div class="row" style="justify-content: center">
    <div class="box shadow-lg" 
  style="background-color: rgba(57, 36, 5, 0.23);
  margin:100px;
  border-radius:60px">
    <img src="{{URL::asset('/images/logo.png')}}" class="img-fluid" alt="Responsive image" 
  style="height:160px; padding:10px">

  </div>
</div>
<div class="row" style="justify-content: center">
    <div class="box shadow-lg" 
  style="background-color: rgba(74, 48, 10, 0.073);
  border-radius:10px;
  margin-top:-50px;">
  <h2 style="color: rgb(215, 184, 143);
  font-style:italic;">"Quality Nursing At Your Doorstep."</h2>

  </div>
</div>
</div>
@endsection
