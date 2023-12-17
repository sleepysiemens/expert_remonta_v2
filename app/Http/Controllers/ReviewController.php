<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Contact;
use App\Models\About;
use App\Models\WhyCard;
use App\Models\Seo;
class ReviewController extends Controller
{
    public function index()
    {
        $Abouts=About::all();
        $WhyCards=WhyCard::all();
        $reviews=Review::all();
        $contacts=Contact::all();
        $whatsapp=Contact::query()->select('link')->where('name','=','whatsapp')->get();
        $telegram=Contact::query()->select('link')->where('name','=','telegram')->get();
        $instagram=Contact::query()->select('link')->where('name','=','instagram')->get();
        $phone=Contact::query()->select('link')->where('name','=','phone')->get();
        $seos=Seo::query()->where('page','=','contacts')->get();

        $page='contacts';


        return view('reviews.index', compact(['reviews', 'whatsapp', 'telegram', 'instagram', 'phone', 'Abouts', 'WhyCards', 'page', 'seos']));
    }
}
