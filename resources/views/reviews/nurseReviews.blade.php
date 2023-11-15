@extends('layout')

@section('title', 'Ratings and Reviews')

@section('content')
    <div class="container">
        <h2>Ratings and Reviews</h2>


        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form for submitting reviews -->
        <form action="{{ route('ratings-and-reviews.submit') }}" method="post">
            @csrf
            <label for="nurse_id">Enter Nurse ID:</label>
            <input type="text" name="nurse_id" id="nurse_id">
            <button type="submit">Submit Review</button>
        </form>
    </div>
@endsection