@extends('layout')

@section('title','Nurse Booking')
@section('content')
<div class="container">
    <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
        <h2 style="margin: 10px;">Schedule Selection</h2>
    </div>
    <hr style="border-color:rgba(250, 235, 215, 0.309);">

    <div class="row" style="justify-content:center;">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-80 " style="border-radius:40px;" width="260px" height="240px" src="{{URL::asset("uploads/".$nurse->photo)}}" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-80" style="border-radius:40px;" width="260px" height="240px" src="{{URL::asset("uploads/".$service->image)}}" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>

    </div>


    <div class="box" style="margin-left:230px;color:rgb(238, 218, 195);font-weight:bolder;padding-top:10px;">
        <h4>For {{$service->name}}, cost for a month = {{$service->cost}} BDT</h4>
        <h5 style="margin-left: 200px;">Amount per week = {{$service->cost/4}} BDT</h5>
        <h6 style="margin-left: 130px;color:rgb(241, 158, 125);">-----Check neighboring months to avoid booking clashes!-----</h6>

    </div>


        
        






    
    @foreach ($schedule as $month )
    
    <div class="row shadow" style="border-radius:15px;
    background-color:rgba(200, 162, 116, 0.609);
    padding:20px;margin:20px;justify-content:center;
    color:rgb(66, 40, 6);">
        <div class="row">
            <h5 style="margin-top:5px;">Want to book <strong>{{$nurse->name}}</strong> from 
                <u style="color: rgb(96, 57, 2);"><i>{{$month}}?</i></u></h5>
            

        </div>
        
        <div class="row">
            <button style="border-radius: 20px;padding:8px;
            background-color:rgb(74, 42, 3);color:#eeddaadd;
            font-weight:bold;margin-left:40px;"
            type="button" data-toggle="modal" data-target="#modal-{{$month}}">
            Set Schedule</button>

        </div>
    </div>

    <div class="modal fade" id="modal-{{$month}}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content" style="background-color: rgba(193, 175, 94, 0.989);">

            <div class="modal-header" style="color: rgb(79, 45, 4);">
              <h5 class="modal-title" style="font-weight:bolder;"><i>Timing Setting</i></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body" style="color: rgb(79, 45, 4);">

                @if ($state === 0)
                <h5>No Bookings for {{$month}}.</h5>


                <form action="{{url('/slot_nurses/')}}/{{$nurse->nurse_id}}/{{$service->name}}" method="POST" style="background-color:#775a0aac; 
                margin:35px;
                padding:20px;
                border-radius:20px;
                box-shadow:10px 10px #3c2d02aa;color:bisque;font-weight:bolder;">
                    @csrf 
                    <div class="form-group">
                        <label for="nurse_id">Nurse ID</label>
                        <input type="text" class="form-control shadow" name="nurse_id" aria-describedby="id" value="{{$nurse->nurse_id}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="type">Service Type</label>
                        <input type="text" class="form-control shadow" name="service_type" aria-describedby="type" value="{{$service->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="begin-date">Service Begin Date</label>
                        <input type="date" class="form-control shadow" name="service_start" aria-describedby="date" placeholder="Enter starting date" value="{{old('service_start')}}">
                        <span style="font-weight: bolder;
                        color:rgb(102, 4, 4)">
                        @error('service_start')
                        {{$message}}
                        @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="end-date">Service End Date</label>
                        <input type="date" class="form-control shadow" name="service_end" aria-describedby="date" placeholder="Enter ending date" value="{{old('service_end')}}">
                        <span style="font-weight: bolder;
                        color:rgb(102, 4, 4)">
                        @error('service_end')
                        {{$message}}
                        @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control shadow" name="status" aria-describedby="status" value="Active" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pay">Select Payment Method</label>
                        <select class="form-control shadow" name="payment_method">
                          <option>Cash After Service</option>
                          <option>Prepaid Online</option>
                        </select>
                    </div>
                    <button type="submit" style="border-radius: 10px;padding:6px;
                      background-color:#3a2903dd;color:bisque;
                      margin-right:20px;">Confirm Booking</button>
                  </form>
                
                @else
                    @foreach ($booked_days_in_months as $one_month)
                    @php
                        //$data = 0;
                        if(isset($one_month[$month])){
                            $data = $one_month[$month];
                        }
                    @endphp
                    
                    
                    @endforeach
                    @if (count($data) != 0)

                    @foreach ($data as $individual)
                    <div class="row" style="padding:10px;">
                        <h5>Booked From: {{date('F j, Y', strtotime($individual->service_start))}} to {{date('F j, Y', strtotime($individual->service_end))}} </h5>
                    </div>
                    
                        
                    @endforeach
                    <form action="{{url('/slot_nurses/')}}/{{$nurse->nurse_id}}/{{$service->name}}" method="POST" style="background-color:#775a0aac; 
                    margin:35px;
                    padding:20px;
                    border-radius:20px;
                    box-shadow:10px 10px #3c2d02aa;color:bisque;font-weight:bolder;">
                    @csrf 
                        <div class="form-group">
                            <label for="nurse_id">Nurse ID</label>
                            <input type="text" class="form-control shadow" name="nurse_id" aria-describedby="id" value="{{$nurse->nurse_id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="type">Service Type</label>
                            <input type="text" class="form-control shadow" name="service_type" aria-describedby="type" value="{{$service->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="begin-date">Service Begin Date</label>
                            <input type="date" class="form-control shadow" name="service_start" aria-describedby="date" placeholder="Enter starting date" value="{{old('service_start')}}">
                            <span style="font-weight: bolder;
                            color:rgb(102, 4, 4)">
                            @error('service_start')
                            {{$message}}
                            @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="end-date">Service End Date</label>
                            <input type="date" class="form-control shadow" name="service_end" aria-describedby="date" placeholder="Enter ending date" value="{{old('service_end')}}">
                            <span style="font-weight: bolder;
                            color:rgb(102, 4, 4)">
                            @error('service_end')
                            {{$message}}
                            @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control shadow" name="status" aria-describedby="status" value="Active" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pay">Select Payment Method</label>
                            <select class="form-control shadow" name="payment_method">
                              <option>Cash After Service</option>
                              <option>Prepaid Online</option>
                            </select>
                        </div>
                        <button type="submit" style="border-radius: 10px;padding:6px;
                        background-color:#3a2903dd;color:bisque;
                        margin-right:20px;">Confirm Booking</button>
                    </form>
                    
                    
                    
                    @else
                    <h5>No Bookings for {{$month}}.</h5>

                    <form action="{{url('/slot_nurses/')}}/{{$nurse->nurse_id}}/{{$service->name}}" method="POST" style="background-color:#775a0aac; 
                    margin:35px;
                    padding:20px;
                    border-radius:20px;
                    box-shadow:10px 10px #3c2d02aa;color:bisque;font-weight:bolder;">
                    @csrf 
                        <div class="form-group">
                            <label for="nurse_id">Nurse ID</label>
                            <input type="text" class="form-control shadow" name="nurse_id" aria-describedby="id" value="{{$nurse->nurse_id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="type">Service Type</label>
                            <input type="text" class="form-control shadow" name="service_type" aria-describedby="type" value="{{$service->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="begin-date">Service Begin Date</label>
                            <input type="date" class="form-control shadow" name="service_start" aria-describedby="date" placeholder="Enter starting date" value="{{old('service_start')}}">
                            <span style="font-weight: bolder;
                            color:rgb(102, 4, 4)">
                            @error('service_start')
                            {{$message}}
                            @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="end-date">Service End Date</label>
                            <input type="date" class="form-control shadow" name="service_end" aria-describedby="date" placeholder="Enter ending date" value="{{old('service_end')}}">
                            <span style="font-weight: bolder;
                            color:rgb(102, 4, 4)">
                            @error('service_end')
                            {{$message}}
                            @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control shadow" name="status" aria-describedby="status" value="Active" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pay">Select Payment Method</label>
                            <select class="form-control shadow" name="payment_method">
                              <option>Cash After Service</option>
                              <option>Prepaid Online</option>
                            </select>
                        </div>
                        <button type="submit" style="border-radius: 10px;padding:6px;
                        background-color:#3a2903dd;color:bisque;
                        margin-right:20px;">Confirm Booking</button>
                    </form>
                    
                    @endif
                
                @endif


            </div>
          </div>
        </div>
      </div>
    
        
    @endforeach
        
    


</div>
@endsection