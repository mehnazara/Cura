@extends('layout')

@section('title','Image Change')
@section('content')
<div class="container">
    <div class="row" style="justify-content: center; color:antiquewhite;font-weight:bold; margin-top:60px;">
        <form action="{{route('patientimagechange')}}" class="float-right" method="post" enctype="multipart/form-data">
            @csrf
            <label for="picture">Upload New Picture:</label>
            <input type="file" name="picture" id="picture">
            <div class="div mr-5 text-center">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
            
        </form>
    </div>
</div>
@endsection