@extends('layout')

@section('title', 'Patient Services')

@section('content')
<div class="container">
    <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
        <h2 class="mt-4 mb-4">Currently Acquired Services</h2>
        @if($detail && count($detail)>0)
        @php
            $nurse = $nurse_details[0]; 
        @endphp

            @foreach($detail as $services)
                    @foreach($services as $service)
                    <div class="card mb-3 shadow" style="width: 100rem; height 100px;background-color: #4a7951c9;overflow: hidden;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ URL::asset("uploads/" . $service['image']) }}" class="card-img" alt="{{ $service['name'] }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: bold; font-size: 30px;">{{ $service['name'] }}</h5>
                                    <p class="card-text" style="font-style: italic; font-size: 18px;">{{ $service['description'] }}</p>
                                    <p class="card-text"><strong>Weeks Left:</strong> {{ $service['duration'] }} </p>
                                    <p class="card-text"><strong>Cost of Service:</strong> {{ $service['cost'] }} BDT </p>
                                    
                                    <div class="btn-group" role="group">
                                        <button style="border-radius: 10px;padding:6px;
                                        background-color:#012d1ddd;color:bisque;"
                                        type="button" data-toggle="modal" data-target="#modal-{{$nurse->nurse_id}}">
                                        Nurse Details</button>
                                        <a href="#" tabindex="-1" role="button" aria-disabled="true"button style="border-radius: 10px;padding:6px;
                                        background-color:#012d1ddd;color:bisque;"
                                        type="button">  Pay Nurse</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($nurse_details as $nurse)
                        <div class="modal fade" id="modal-{{$nurse->nurse_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" style="background-color: #4c6404f1;">

                                    <div class="modal-header" style="color: bisque; font-weight:bold;">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{$nurse->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body" style="margin-left: 15px;color: bisque;">
                                        <div class="row">
                                            <img src="{{ URL::asset("uploads/" . $nurse->photo) }}" alt="{{ $nurse->name }}" style="max-width: 100px; max-height: 100px; border-radius: 50%;">
                                        </div>
                                        <div class="row">
                                            <span>Phone: {{$nurse->phone}}</span>
                                        </div>
                                        <div class="row">
                                            <span>Qualifications: {{$nurse->qualifications}}</span>
                                        </div>
                                        <div class="row">
                                            <span>Gender: {{$nurse->gender}}</span>
                                        </div>
                                        <div class="row">
                                            <span>Age: {{$nurse->age}} years old</span>
                                        </div>
                                        <div class="row">
                                            <span>Nursing Types: {{ implode(', ', json_decode($nurse->nursing_types)) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            @endforeach
        @else
            <p> No Current Services. </p>
        @endif
    </div>

</div>
@endsection