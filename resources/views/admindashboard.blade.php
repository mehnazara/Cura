@extends('layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">

    <div class="row justify-content-center" style="margin: 30px;">
        <div class="col-12">
            <div class="card" style="background-color: #355e354f; color: blanchedalmond; font-weight: bold;">
                <div class="card-header" style="font-size: 25px; font-style: italic">Admin Dashboard</div>
                @auth('admin')
                <div class="card-body">
                    <hr>
                    <div class="row">
                        <div class="col-6 mt-3">
                            <h5>Admin Name - {{ auth()->guard('admin')->user()->name }}</h5>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <h5>Email - {{ auth()->guard('admin')->user()->email }}</h5>
                        </div>

                        <div class="col-6 text-center">
                            <a href="{{route('show_patients_and_services')}}" class="btn"
                                style="background-color: rgb(58, 112, 43); color: antiquewhite; font-weight: bold; border-radius: 20px;">Show Active Services
                                </a>
                        </div>
                    </div>
                    <hr>


                    <hr>
                    <h5> All Nurses </h5>
                    <div class="container" style="margin-top:10px;">
                        <form method="get" action="{{ route('view_nurses') }}">
                            <div class="row" style="margin-bottom:10px;">
                                <div class="col-6 text-center" >
                                    <a href="#" class="btn"
                                        style="background-color: rgb(24, 54, 16); color: antiquewhite; font-weight: bold; border-radius: 20px;">Add Nurse
                                        </a>
                                </div>

                                <div class="col-6 text-center">
                                    <input type="text" name="search" class="form-control" placeholder="Search Nurses">
                                </div>
                            </div>
                        </form>
                        <table class="table table-success table-striped-columns">
                            <thead>
                                <tr>
                                    <th scope="col" >ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                </tr>
                 
                            <tbody>
                                @foreach($nurses as $nurse)
                                    <tr>
                                        <td>{{ $nurse->id }}</td>
                                        <td>{{ $nurse->name }}</td>
                                        <td>{{ $nurse->email }}</td>
                                        <td>{{ $nurse->phone }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                @endauth
            </div>
        </div>
    </div>



</div>

@endsection