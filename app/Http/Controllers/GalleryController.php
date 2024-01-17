<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;
use App\Models\Seo;
use Stevebauman\Location\Facades\Location;



class GalleryController extends Controller
{
    public function index()
    {
        $galleries=Gallery::all();
        $seos=Seo::query()->where('page','=','gallery')->get();

        $page='gallery';

        return view('gallery.index', compact(['galleries', 'page', 'seos']));
    }
}
