<!-- resources/views/nurses/show.blade.php -->



@section('content')
    <h1>{{ $nurse->name }}'s Profile</h1>

    <!-- nurse info -->

    <h2>Reviews</h2>
    @foreach ($reviews as $review)
        <div>
            <p>{{ $review->user->name }} - Rating: {{ $review->rating }}</p>
            <p>{{ $review->comment }}</p>
        </div>
    @endforeach

    <hr>

   
    <h2>Submit a Review</h2>
    <form method="post" action="{{ route('nurses.storeReview', $nurse->id) }}">
        @csrf
        <label for="rating">Rating:</label>
        <input type="number" name="rating" required min="1" max="5">

        <label for="comment">Comment:</label>
        <textarea name="comment"></textarea>

        <button type="submit">Submit Review</button>
    </form>
@endsection
