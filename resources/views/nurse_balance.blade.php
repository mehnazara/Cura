@extends('layout')

@section('title', 'Account Balance') 
@section('content')
<div class="container">
    <div class="row" style="background: rgba(0, 255, 0, 0.1);margin-top: 30px;">
        <h2 class="mt-4 mb-4" style="color: white; ">Nurse Balance</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                    
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Patient Name</th>
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Amount</th>
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Status</th>
                        <th scope="col" style="color: white; background-color: #4c6404f1;">Payment Method</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($inserviceList as $balanc)

                        <tr>
                        <td style="color: white;">
                            @php
                                $patient = \App\Models\Patient::find($balanc['patient_id']);
                                echo ($patient) ? $patient->name : 'Patient Not Found';
                            @endphp
                        </td>
                        <td style="color: white;">{{ $balanc['amount'] }}</td>
                        <td style="color: white;">{{ $balanc['status'] }}</td>
                        <td style="color: white;">{{ $balanc['payment_method'] }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
@endsection