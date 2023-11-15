<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NurseReview extends Controller
{
    public function index()
    {
        return view('/reviews/nurseReviews');
    }

    public function submitReview(Request $request)
    {
        // Handle the form submission, associate the review with the nurse using $request->input('nurse_id')
        // You can store the review in the database or perform any other necessary actions
        // ...

        return redirect()->route('ratings-and-reviews')->with('success', 'Review submitted successfully!');
    }
}
