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
        $seo=Seo::query()->where('page','=','price')->first();

        $page='price';

        return view('price.index', compact(['prices', 'page', 'seo']));
    }
}
