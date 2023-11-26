@extends('layout')

@section('title', 'Nurse Current Clients') 
@section('content')
<div class="container">
    <div class="row" style="background: rgba(0, 255, 0, 0.1); margin-top: 30px;">
        <h2 class="mt-4 mb-4" style="color: white;">Currently Serving Patients</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" style="color: white; background-color: #4c6404f1;">Name</th>
                    <th scope="col" style="color: white; background-color: #4c6404f1;">Report</th>
                    <th scope="col" style="color: white; background-color: #4c6404f1;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list1 as $patient)
                <tr>
                    <td style="color: white;">{{ $patient->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button style="border-radius: 10px; padding:6px; background-color:#012d1ddd; color:bisque;" type="button" data-toggle="modal" data-target="#report-modal-{{$patient->patient_id}}">
                                View Report
                            </button>
                        </div>
                    </td>
                    <td>
                        <!-- View Details Button -->
                        <div class="btn-group" role="group">
                            <button style="border-radius: 10px; padding:6px; background-color:#012d1ddd; color:bisque;" type="button" data-toggle="modal" data-target="#modal-{{$patient->patient_id}}">
                                Patient Details
                            </button>
                        </div>

                        <!-- View Details Modal -->
                        <div class="modal fade" id="modal-{{$patient->patient_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content" style="background-color: #4c6404f1;">

                                    <div class="modal-header" style="color: bisque; font-weight:bold;">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{$patient->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body" style="margin-left: 15px;color: bisque;">
                                        <div class="row">
                                            Phone = {{$patient->phone}}
                                        </div>
                                        <div class="row">
                                            Email = {{$patient->email}}
                                        </div>
                                        <div class="row">
                                            Birth Date =  {{$patient->birthdate}}
                                        </div>
                                        
                                    </div>

                                    <div class="modal-footer">
                                        <!-- Add additional buttons or actions if needed -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Report Modal -->
                        <div class="modal fade" id="report-modal-{{$patient->patient_id}}" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content" style="background-color: #4c6404f1;">

                                    <div class="modal-header" style="color: bisque; font-weight:bold;">
                                        <h5 class="modal-title" id="reportModalLabel">{{$patient->name}}'s Report</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <!-- Assuming 'report' is a path to the image file -->
                                        <img src="{{URL::asset('uploads/'.$patient['report']) }}" alt="Patient Report" style="max-width: 100%; height: auto;">
                                    </div>

                                    <div class="modal-footer">
                                        <!-- Add additional buttons or actions if needed -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
