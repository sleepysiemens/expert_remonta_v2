<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;


class DestroyController extends Controller
{
    public function index(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.review.index');
    }
}
