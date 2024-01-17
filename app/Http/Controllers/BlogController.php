<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\About;
use App\Models\WhyCard;
use App\Models\Seo;
use App\Models\Blog;
use Stevebauman\Location\Facades\Location;




class BlogController extends Controller
{
    public function index(Blog $blog)
    {
        $Abouts=About::all();
        $WhyCards=WhyCard::all();
        $reviews=Review::all();

        $seos=Seo::query()->where('page','=','contacts')->get();
        $page='contacts';

        return view('blog.index', compact(['blog','reviews', 'Abouts', 'WhyCards', 'page', 'seos']));
    }
}
