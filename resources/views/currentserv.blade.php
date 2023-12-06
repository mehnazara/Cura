@extends('layout')

@section('title', 'Patient Services')

@section('content')
<div class="container">
    <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
        <h2 class="mt-4 mb-4">Currently Acquired Services</h2>
        @if($sd && count($sd) > 0)
            @foreach($sd as $service)
                <div class="card mb-3 shadow" style="width: 100rem; height 100px;background-color: #4a7951c9;overflow: hidden;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ URL::asset("uploads/" . $service['services']['image']) }}" class="card-img" alt="{{ $service['services']['name'] }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold; font-size: 30px;">{{ $service['services']['name'] }}</h5>
                                <p class="card-text" style="font-style: italic; font-size: 18px;">{{ $service['services']['description'] }}</p>
                                <p class="card-text"><strong>Service started:</strong> {{ $service['start']->toDateString() }} </p>
                                <p class="card-text"><strong>Service ends:</strong> {{ $service['end']->toDateString() }} </p>
                                <p class="card-text"><strong>Days Left:</strong> {{ $service['numberOfDays'] }} </p>
                        
                                
                                @if($service['payment']==='Cash After Service')
                                <p class="card-text"><strong>Pay (Cash After Service):</strong> {{ $service['amount'] }} BDT  </p>
                                @else
                                <p class="card-text"><strong>Prepaid Amount:</strong> {{ $service['amount'] }} BDT </p>
                                @endif
                                <div class="row">
                                    <div class="btn-group" role="group">
                                        <button style="border-radius: 10px; padding:6px; background-color:#012d1ddd; color:bisque;margin-left:10px;" type="button" data-toggle="modal" data-target="#modal-{{$service['nurse_id']}}">
                                            Nurse Details
                                        </button>
                                    </div>
                                    <a href="{{url('/servicedone/')}}/{{$service['service_id']}}">
                                        <button type="button" style="border-radius: 10px;padding:6px;
                                          background-color:#2d2001dd;color:bisque;margin-left:30px;">Service Complete</button>
                                    </a>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nurse modal -->
                <div class="modal fade" id="modal-{{$service['nurse_id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="background-color: #4c6404f1;">

                            <div class="modal-header" style="color: bisque; font-weight:bold;">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{$service['services']['name']}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body" style="margin-left: 15px;color: bisque;">
                                @foreach($nd as $nurse)
                                    @if($nurse->nurse_id == $service['nurse_id'])
                                        <!-- Nurse details code -->
                                        <div class="row">
                                            <img src="{{ URL::asset("uploads/" . $nurse['photo']) }}" alt="{{ $nurse['name'] }}" style="max-width: 100px; max-height: 100px; border-radius: 50%;">
                                        </div>
                                        <div class="row">
                                            <span>Name: {{$nurse['name']}}</span>
                                        </div>
                                        <div class="row">
                                            <span>Phone: {{$nurse['phone']}}</span>
                                        </div>
                                        <div class="row">
                                            <span>Qualifications: {{$nurse['qualifications']}}</span>
                                        </div>
                                        <div class="row">
                                            <span>Gender: {{$nurse['gender']}}</span>
                                        </div>
                                        <div class="row">
                                            <span>Age: {{$nurse['age']}} years old</span>
                                        </div>
                                        
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No Current Services.</p>
        @endif
    </div>
</div>
@endsection
