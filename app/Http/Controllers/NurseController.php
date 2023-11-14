<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nurse;
use App\Models\Review;

class NurseController extends Controller
{
    // Other methods...

    public function show($id)
    {
        $nurse = Nurse::find($id);
        $reviews = Review::where('nurse_id', $id)->get();

        return view('nurses.show', compact('nurse', 'reviews'));
    }

    public function storeReview(Request $request, $nurseId)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string',
        ]);

        $review = new Review([
            'user_id' => auth()->id(),
            'nurse_id' => $nurseId,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        $review->save();

        return redirect()->route('nurses.show', $nurseId)->with('success', 'Review submitted successfully!');
    }

    public function profiles(){
        $nurses = Nurse::all();
        return view('/nurse/allprofiles', compact('nurses'));
    }
}
