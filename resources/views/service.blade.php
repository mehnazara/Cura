@extends('layout')

@section('title','Services')
@section('content')
<div class="container">
    <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
        <h2 style="margin: 12px;">Acts of Assistance</h2>
        
    </div>
    <hr style="border-color:rgba(250, 235, 215, 0.309);">
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
</div>
@endsection