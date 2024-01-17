<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\About;
use App\Models\Seo;



class ContactsController extends Controller
{
    public function index()
    {
        $Abouts = About::all();
        $reviews = Review::all();
        $Headers = Header::all();
        $seo = Seo::query()->where('page','=','contacts')->first();

        $page='contacts';

        return view('contacts.index', compact(['reviews', 'Abouts', 'page', 'seo', 'Headers']));
    }
}
