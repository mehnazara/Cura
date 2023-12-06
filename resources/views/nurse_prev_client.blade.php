@extends('layout')

@section('title', 'Nurse Previous Clients') 
@section('content')
<div class="container">
    <div class="row" style="background: rgba(0, 255, 0, 0.1);margin-top: 30px;">
        <h2 class="mt-4 mb-4" style="color: white; ">Previously Served Patients</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                    
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Name</th>
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Ratings</th>
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Reviews</th>
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $patient)

                        <tr>
                        <td style="color: white;">{{ $patient['patient_data']['name'] }}</td>
                            <td style="color: white;">
                                @for ($i = 1; $i <= $patient['comments']['rating']; $i++)
                                    <span class="star">&#9733;</span>
                                @endfor
                            </td>
                            <td  style="color: white;">{{ $patient['comments']['comment'] }}</td>

                            <td>
                                <!-- View Details Button -->
                                <div class="btn-group" role="group">
                                    <button style="border-radius: 10px; padding:6px; background-color:#012d1ddd; color:bisque;"
                                        type="button" data-toggle="modal" data-target="#modal-{{$patient['patient_data']['patient_id']}}">
                                        View Patient Details
                                    </button>
                                </div>
                                
                                <!-- View Details Modal -->
                                <div class="modal fade" id="modal-{{$patient['patient_data']['patient_id']}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content" style="background-color: #4c6404f1;">
                                            <div class="modal-header" style="color: bisque; font-weight:bold;">
                                                <h5 class="modal-title" id="exampleModalLongTitle">{{$patient['patient_data']['name']}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="margin-left: 15px;color: bisque;">
                                                <div class="row">
                                                    Phone = {{$patient['patient_data']['phone']}}
                                                </div>
                                                <div class="row">
                                                    Email = {{$patient['patient_data']['email']}}
                                                </div>
                                                <div class="row">
                                                    Birth Date = {{$patient['patient_data']['birthdate']}}
                                                </div>
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
