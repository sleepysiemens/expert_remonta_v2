<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;


class UpdateController extends Controller
{
    public function index(Review $review)
    {
        $data=request()->validate(['username'=>'required|string', 'rating'=>'required|integer', 'text'=>'required|max:1000']);
        $review->update($data);

        return redirect()->route('admin.review.show', $review->id);
    }
}
