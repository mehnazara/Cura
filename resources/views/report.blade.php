@extends('layout')

@section('title','Medical Report')
@section('content')
<div class="container">
    <div class="row mt-3" style="justify-content: center;">
        <img src="{{URL::asset("uploads/".auth()->user()->report)}}" width="700px" height="1000px">
    </div>
    <div class="row" style="justify-content: center; color:antiquewhite;font-weight:bold; margin:20px;">
    
        <form action="{{route('patientreportchange')}}" class="float-right" method="post" enctype="multipart/form-data">
            @csrf
            <label for="report">Update Report:</label>
            <input type="file" name="report" id="report">
            <div class="div mr-5 text-center">
                <button type="submit" class="btn btn-success">Update Report</button>
            </div>
            
        </form>
    </div>
</div>
@endsection