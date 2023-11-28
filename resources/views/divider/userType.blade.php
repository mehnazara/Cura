@extends('divider.layout2')
@section('title','Define Yourself')

@section('content')
<div class="container-fluid">
  


  <div class="row" style="justify-content:center;margin-top:60px;">
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
  <div class="row" style="justify-content: center;margin-top:50px;">
    <div class="col" style="margin-left:130px;">
        <a href="{{route('register')}}"><button style="padding:15px;font-weight:650;border-radius:20px;
        background-color:#013220be;color:blanchedalmond;
        box-shadow: 5px 10px rgba(7, 4, 0, 0.507);">In need of nursing services? Find Here!</button></a>

    </div>

    <div class="col" style="margin-left:-60px;">
        <a href="{{route('nurselogin')}}"><button style="padding:15px;font-weight:700;border-radius:20px;
        background-color:rgba(250, 235, 215, 0.682);
        color:rgb(60, 37, 4);box-shadow: 5px 10px rgba(219, 182, 136, 0.208);">Are you a registered nurse? Join Us</button></a>

    </div>

    <div class="col" style="margin-left:-90px;">
        <a href="#"><button style="padding:15px;font-weight:600;border-radius:20px;
        background-color:#8a9a5b;color:#f0efe4;box-shadow: 5px 10px rgba(250, 235, 215, 0.087);">An Admin? Click Here</button></a>

    </div>

  </div>
</div>

@endsection