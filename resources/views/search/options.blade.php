@extends('layout')

@section('title','Search Results')
@section('content')
<div class="container">
    @php
        $services = $data[0];
        $nurses = $data[1];
    @endphp
    {{--<span>{{$nurses[0]['name'];}}</span>--}}
    <div class="row">
        <form class="form-inline" action="{{route('search')}}" method="post">
            @csrf
            <button type="submit" class="btn" style="margin-left: -30px;">
              <img src="{{URL::asset('images/search.png')}}" width="50px" height="50px"></button>
            <div class="form-group" style="margin-left: -20px;">
              <input style="border-radius:30px;" type="search" name="search" class="form-control col-7" value="{{$search}}" placeholder="Search">
            </div>
            
          </form>
    </div>
    <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
        <h2 style="margin: 12px;">Search Results</h2>
        
    </div>
    <hr style="border-color:rgba(250, 235, 215, 0.309);">
    @if ((count($services) === 0) && (count($nurses) === 0))
    <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
        <h2 style="margin: 12px;">No Results Found!</h2>
        
    </div>
    @else
        @if (count($services) != 0)
        <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
            <h2 style="margin: 12px;">Services</h2>
            
        </div>
        <div class="row" style="justify-content: center; color:rgb(93, 57, 8);font-weight:bold; margin-top:20px;">

        
            
            @foreach ($services as $service )

            <div class="card shadow" style="width: 18rem; margin:10px;background-color: #4a7951c9;">
                <img class="card-img-top" src="{{URL::asset("uploads/".$service->image)}}" alt="Card image cap">
                <div class="card-body" style="color: #f1eec6;">
                <h5 class="card-title">{{$service->name}}</h5>
                <p class="card-text">{{$service->description}}</p>
                <div class="div text-center">
                    <button style="border-radius: 10px;padding:6px;
                    background-color:#012d1ddd;color:bisque;"
                    type="button" data-toggle="modal" data-target="#modal-{{$service->service_id}}">
                    View Details</button>
                </div>
                
                </div>
            </div>

            <div class="modal fade" id="modal-{{$service->service_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background-color: #4c6404f1;">

                    <div class="modal-header" style="color: bisque; font-weight:bold;">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{$service->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <div class="modal-body" style="margin-left: 15px;color: bisque;">
                        <div class="row">
                            {{$service->description}}
                        </div>
                        <div class="row">
                            Duration of service = {{$service->duration}} weeks.
                        </div>
                        <div class="row">
                            Cost per week = {{$service->cost/4}}Tk.
                        </div>
                    
                    
                    </div>
                    <div class="modal-footer">
                        <a href="{{url('/services-types/')}}/{{$service->service_id}}">
                    <button type="button" style="background-color:rgb(229, 204, 173);
                    border-radius:15px;padding:8px;color:rgb(65, 40, 7);
                    font-weight:bolder">Assigned Nurses</button></a>
                    </div>
                </div>
                </div>
            </div>
                
            @endforeach
        </div>
            
        @endif
        @if (count($nurses) != 0)
        <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
            <h2 style="margin: 12px;">Nurses</h2>
            
        </div>
        <div class="row" style="justify-content: center; color:rgb(93, 57, 8);font-weight:bold; margin-top:20px;">

    
        
            @foreach ($nurses as $nurse )
    
            <div class="card" style="width: 18rem; margin:10px;background-color: #4a7951c9;">
                <img class="card-img-top" src="{{URL::asset("uploads/".$nurse->photo)}}" alt="Card image cap">
                <div class="card-body" style="color: #f1eec6;">
                  <h5 class="card-title">{{$nurse->name}}</h5>
                  <div class="div">
                    <button style="border-radius: 10px;padding:6px;
                    background-color:bisque;color:#012d1ddd;font-weight:bold;"
                    type="button" data-toggle="modal" data-target="#modal-{{$nurse->nurse_id}}">
                    View Details</button>
                    <a href="{{url('/booked_nurses/')}}/{{$nurse->nurse_id}}">
                      <button type="button" style="border-radius: 10px;padding:6px;
                      background-color:#012d1ddd;color:bisque;" >Book Nurse</button>
                    </a>
                  </div>
                  
                </div>
              </div>
    
              <div class="modal fade" id="modal-{{$nurse->nurse_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content" style="background-color: #bcb88af1;">
    
                    <div class="modal-header" style="color: rgb(78, 46, 7); font-weight:bold;">
                      
                      @if ($nurse->gender === 'female')
                      <img src="{{URL::asset("images/female.png")}}" width="50px" height="30px">
                      @else
                      <img src="{{URL::asset("images/male.png")}}" width="50px" height="30px">
                      @endif
                      <h5 class="modal-title" id="exampleModalLongTitle">{{$nurse->name}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
    
                    <div class="modal-body" style="margin-left: 15px;color: rgb(72, 43, 7);">
                        <div class="row">
                            Graduated from: {{$nurse->qualifications}}
                        </div>
                        <div class="row">
                            Gender: {{$nurse->gender}} nurse.
                        </div>
                        <div class="row">
                            Age: {{$nurse->age}} years old.
                        </div>
                            @php
                            $types = json_decode($nurse->nursing_types);
                            @endphp
                            <div class="row" style="color:black;font-weight:bolder;margin-top:25px;">
                              <h5><i><u>Associated With</u></i></h5>
                            </div>
                            
    
                            @foreach ($types as $type )
                            <div class="row">
                              <span>{{$type}}</span>
                            </div>
                            
                    
                            @endforeach
                      
                      
                    </div>
                  </div>
                </div>
              </div>
                
            @endforeach
        </div>
            
        @endif
    @endif
</div>
@endsection