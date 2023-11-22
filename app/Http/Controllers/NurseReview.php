<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nurse;
use App\Models\Review;
use App\Models\Patient;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class NurseReview extends Controller
{
    public function showReview($nurse_id)
    {
        $comment_finder = Review::find($nurse_id);
        if($comment_finder){
        $nurse = Nurse::find($nurse_id);
        $comments = json_decode($comment_finder->comments);
        $all_reviews = [];
        foreach($comments as $comment){
            $one_comment = Comment::find($comment);
            $patient = Patient::find($one_comment->patient_id);
            $one_review = ["patient_name" => $patient->name,"patient_image" => $patient->profilePicture,"comment" => $one_comment->comment,"rating" => $one_comment->rating];
            $all_reviews[] = $one_review;

        }
        return view("/reviews/nurseReviews",compact('all_reviews','nurse','comment_finder'));
    } else {
        return redirect(route('nurse.profiles'))->with('error', 'No reviews for this nurse yet.');
    }
    }

}
