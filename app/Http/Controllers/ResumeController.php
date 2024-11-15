<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function ratingRelationship()
    {
        return $this->hasOne(Rating::class);
    }    

    public function show()
    {
        return view('resume.show');
    }

    public function rateResume(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        $user = auth()->user();
    
        // Check if the user has already rated
        $existingRating = $user->rating;
    
        if ($existingRating) {
            // Update the existing rating
            $existingRating->update(['rating' => $request->rating]);
        } else {
            // Create a new rating
            $user->rating()->create(['rating' => $request->rating]);
        }
    
        return redirect()->back()->with('status', 'Your rating has been submitted!');
    }
    
}
