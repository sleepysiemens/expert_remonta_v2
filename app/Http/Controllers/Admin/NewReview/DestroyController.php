<?php

namespace App\Http\Controllers\Admin\NewReview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\NewReview;


class DestroyController extends Controller
{
    public function index(NewReview $new_review)
    {
        //dd($new_review);
        $new_review->delete();
        return redirect()->route('admin.new_reviews.index');
    }
}
