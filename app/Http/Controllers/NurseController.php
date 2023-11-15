<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nurse;
use App\Models\Review;
use App\Models\Patient;

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
    public function bookNurse($patient_id, $nurse_id) {

        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'nurse_id' => 'required|exists:nurses,id',
        ]);
        
        $patient = Patient::find($request->input('patient_id'));
        $nurse = Nurse::find($request->input('nurse_id'));
    
      
        $patient->nurses()->attach($nurse);
    
        
        return view('/assigned_nurses')->with('message', 'Successfully assigned the nurse, ' . $nurse->name);
    }
    public function assignedNurses($patient_id) {
    
        $patient = Patient::find($patient_id);
        $assignedNurses = $patient->nurses ?? []; // Adjust this based on your relationship
        
        return view('/assigned_nurses', compact('assignedNurses'));
    }
}
