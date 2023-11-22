<?php

namespace App\Http\Controllers;

use App\Models\Review; 
use Illuminate\Http\Request;
use App\Http\Controllers\ReviewController;

class ReviewController extends Controller
{
    public function index()
    {   $reviews = Review::all();
        return view('reviews.nurseReviews', ['reviews' => $reviews]); 
        //echo 'Hello worlds';
    }

    public function store(Request $request)
    {
        $request->validate([
            'nurse_id' => 'required|exists:nurses,id',
            'rating' => 'required|integer|between:1,5', 
            'comment' => 'nullable|string',
        ]);

        $review = new Review([
            'user_id' => auth()->id(),
            'nurse_id' => $request->input('nurse_id'),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
