<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Contact;
use App\Models\Seo;
use App\Models\NewReview;
use Stevebauman\Location\Facades\Location;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $seo=Seo::query()->where('page','=','reviews')->first();

        $page='reviews';

        return view('reviews.index', compact(['reviews', 'page', 'seo']));
    }

    public function add_review()
    {
        $data=request()->all();
        NewReview::create($data);
        return redirect()->route('reviews.index');
    }
}
