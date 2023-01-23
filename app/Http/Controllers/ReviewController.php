<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
class ReviewController extends Controller
{
    public function reviews() {
        $reviews = Review::with('user','product')->get();
        // dd($reviews);
        return view('review.index',get_defined_vars());
    }

    public function edit_review($id) {
        $review = Review::find($id);
        return view('review.edit',get_defined_vars());
    }

    public function update_review(Request $request, $id) {
        // dd($request->all(), $id);
        $review = Review::find($id);
        $review->review = $request->review;
        $review->save();

        return redirect()->route('reviews')->with('success','Review updated successfully');
    }
    public function delete_review($id) {
        Review::find($id)->delete();
        return redirect()->route('reviews')->with('success','Review deleted successfully');
    }
}
