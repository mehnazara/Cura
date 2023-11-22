@extends('layout')

@section('title', 'Submit Nurse Review')

@section('content')
<div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
    <h2 style="margin: 12px;">Submit A Review</h2>
    
</div>
<hr style="border-color:rgba(250, 235, 215, 0.309);">
<div class="row" style="justify-content: center;">
    <div class="col-5">
        <form method="post" action="{{url('/submitNurseReview/')}}/{{$nurse->nurse_id}}" style="background-color:#ccec6dac; 
        margin:35px;
        padding:20px;
        border-radius:20px;
        box-shadow:10px 10px rgba(71, 114, 31, 0.566);">
            @csrf
            <div class="form-group">
            <label for="rating">Rating</label>
            <select class="form-control" name="rating">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            </div>
            <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" columns="3" rows="2" name="comment"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success shadow">Submit Review</button>
            </div>
        </form>
    </div>

</div>


@endsection