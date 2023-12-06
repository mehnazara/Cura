@extends('layout')

@section('title', 'Nurse Schedule') 
@section('content')
<div class="container">
    <div class="row" style="background: rgba(0, 255, 0, 0.1);margin-top: 30px;">
        <h2 class="mt-4 mb-4" style="color: white; ">Nurse Schedule</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                    
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Patient Name</th>
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Schedule start</th>
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Schedule End</th>
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Total Duration</th>
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Duration Left</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($patientList as $patientInfo)

                    <tr>
                        <td style="color: white;">
                            @php
                                $patient = \App\Models\Patient::find($patientInfo['patient_id']);
                                echo ($patient) ? $patient->name : 'Patient Not Found';
                            @endphp
                        </td>
                        <td style="color: white;">{{ $patientInfo['service_start'] }}</td>
                        <td style="color: white;">{{ $patientInfo['service_end'] }}</td>
                        <td style="color: white;">{{ $patientInfo['total_service_months'] }} months {{ $patientInfo['total_service_days'] }} days</td>
                        <td style="color: white;">{{ $patientInfo['remain_service_months'] }} months {{ $patientInfo['remain_service_days'] }} days</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
@endsection
