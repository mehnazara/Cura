@extends('layout')

@section('title', 'Results')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Patients and Services</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{-- 
                    <h2>Patients</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)
                                <tr>
                                    <th scope="row">{{ $patient->id }}</th>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td>{{ $patient->address }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                    <div class="row">
                        <h2 style="margin-left: 40px;">Services</h2>
                        <a href="#" class="btn"
                        style="background-color: rgb(58, 112, 43); color: antiquewhite; font-weight: bold; border-radius: 20px;
                        margin-left:300px;">Add New Service
                        </a>

                    </div>
                    
                    <table class="table" style="margin:20px;">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Service type</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                                <th scope="col">Nurse name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <th scope="row">{{ $service->service_id }}</th>
                                    <td>{{ $service->service_type }}</td>
                                    <td>{{ $service->service_start }}</td>
                                    <td>{{ $service->service_end }}</td>                                    
                                    <td>{{ $service->nurse_name }}</td>
                                    <td>{{ $service->nursing_type }}</td>
                                    <td>{{ $service->age}}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection