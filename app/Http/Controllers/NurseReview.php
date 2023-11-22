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

    public function sendToReview($nurse_id){
        
        $nurse = Nurse::find($nurse_id);
        //return $nurse_id;
        return view("/reviews/submitNurseReview",compact('nurse'));
    }

    public function submitReview(Request $request,$nurse_id){
        $request->validate([
            'rating' => 'required',
            'comment' => 'required'
        ]);
        $patient = Auth::user();
        $data['patient_id'] = $patient->patient_id;
        $data['comment'] = $request->comment;
        $data['rating'] = number_format($request->rating);
        $comment = Comment::create($data);
        if (!$comment){
            return redirect(route('nurse.profiles'))->with('error', 'Failed to Add Review!');
        }
        $nurse = Review::find($nurse_id);
        if (!$nurse){

            $info['nurse_id'] = $nurse_id;
            $info['comments'] = json_encode([$comment->comment_id]);
            $info['rating'] = $comment->rating;
            $review = Review::create($info);

            
            //data[]
            return redirect(route('nurse.profiles'))->with('success', 'Review Added!');
        }

        $listOfComments = json_decode($nurse->comments);
        $count = 1;
        $total_rating = $comment->rating;
        foreach($listOfComments as $cids){
            $temp = Comment::find($cids);
            $count += 1;
            $total_rating += $temp->rating;

        }
        $listOfComments[] = $comment->comment_id;
        $newRate = floor($total_rating/$count);
        $nurse->comments = json_encode($listOfComments);
        $nurse->rating = $newRate;
        $nurse->save();

        return redirect(route('nurse.profiles'))->with('success', 'Review Added!');
        
        //return $patient;
        
    }

}
