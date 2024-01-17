<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\price;
use App\Models\Contact;
use App\Models\Seo;
use Stevebauman\Location\Facades\Location;



class PriceController extends Controller
{
    public function index()
    {
        $prices=Price::query()->orderBy('category')->get();
        $seos=Seo::query()->where('page','=','price')->get();

        $page='price';

        return view('price.index', compact(['prices', 'page', 'seos']));
    }
}
