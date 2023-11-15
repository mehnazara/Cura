@extends('layout')

@section('content')
<div class="container">
    <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
        <h2 style="margin: 10px;">Previously Booked Nurses</h2>
    </div>
    <hr style="border-color:rgba(250, 235, 215, 0.309);">
    <div class="row" style="justify-content: center; color:rgb(93, 57, 8);margin-top:20px;">
        <div class="row">
            @if (isset($allnurses[0]) && is_array($allnurses[0]))
                @foreach ($allnurses[0] as $bookedNurse)
                    <div class="card" style="width: 14rem; margin:10px;background-color: #4a7951c9;">
                        <!-- Display booked nurse information here -->
                        <img class="card-img-top" src="{{ URL::asset("uploads/".$bookedNurse['photo']) }}" alt="Card image cap">
                        <div class="card-body" style="color: #f1eec6;">
                            <h5 class="card-title">Name:{{ $bookedNurse['name'] }}</h5>
                            <h5 class="card-title">Age:{{ $bookedNurse['age'] }}</h5>
                            <h5 class="card-title">Gender:{{ $bookedNurse['gender'] }}</h5>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No previously booked nurses</p>
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
        <h2 style="margin: 10px;">Nurse to be Booked</h2>
    </div>
    <hr style="border-color:rgba(250, 235, 215, 0.309);">
    <div class="row" style="justify-content: center; color:rgb(93, 57, 8);margin-top:20px;">
        <div class="row">
            @if (isset($allnurses[1]))
                <div class="card" style="width: 14rem; margin:10px;background-color: #4a7951c9;">
                    <!-- Display to be booked nurse information here -->
                    <img class="card-img-top" src="{{ URL::asset("uploads/".$allnurses[1]['photo']) }}" alt="Card image cap">
                    <div class="card-body" style="color: #f1eec6;">
                        <h5 class="card-title">Name:{{ $allnurses[1]['name'] }}</h5>
                        <h5 class="card-title">Age:{{ $allnurses[1]['age'] }}</h5>
                        <h5 class="card-title">Gender:{{ $allnurses[1]['gender'] }}</h5>
                        <a href="#"><button id="requestButton" type="button" style="border-radius: 8px; padding: 6px; 
                        background-color: #012d1ddd; color: bisque;">Request Nurse</button></a>

                        

                       
                    </div>
                </div>
            @else
                <p>No nurse to be booked</p>
            @endif
        </div>
    </div>
</div>
@endsection



