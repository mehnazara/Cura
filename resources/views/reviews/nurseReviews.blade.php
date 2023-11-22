@extends('layout')

@section('title', 'Ratings and Reviews')

{{-- @section('content')
    <div class="container">
        <h2>Ratings and Reviews</h2>
        <form action="/reviews/store" method="POST">
            @csrf
            <input type="text" name="title">
            <textarea name="body" placeholder="body content..."></textarea>
            <button> Save Reviews</button>
        </form>
    </div>
 --}}


    @section('content')
    <div class="container">
        <h2 style="color: white; background-color: red; padding: 20px;">Ratings and Reviews</h2>
        <form action="/reviews/store" method="POST">
            @csrf
            {{-- <input type="hidden" name="nurse_id" value="{{$nurse->id}}" placeholder="Nurse's ID"> --}}
            <input type="text" name="title" placeholder="Title">
            <textarea name="body" placeholder="write your review here..."></textarea>
            <button> Save Reviews</button>
        </form>
    </div>

    
    
    @endsection

