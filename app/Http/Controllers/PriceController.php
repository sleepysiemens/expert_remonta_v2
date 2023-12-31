<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\price;
use App\Models\Contact;
use App\Models\Seo;
use App\Models\City;
use Stevebauman\Location\Facades\Location;



class PriceController extends Controller
{
    public function index()
    {
        $prices=Price::query()->orderBy('category')->get();
        $whatsapp=Contact::query()->select('link')->where('name','=','whatsapp')->get();
        $telegram=Contact::query()->select('link')->where('name','=','telegram')->get();
        $instagram=Contact::query()->select('link')->where('name','=','instagram')->get();
        $phone=Contact::query()->select('link')->where('name','=','phone')->get();
        $seos=Seo::query()->where('page','=','price')->get();
        $cities=City::all();

        $userIP=$_SERVER['REMOTE_ADDR'];
        $location=Location::get($userIP);
        if($location!=false)
            $usr_city=$location->cityName;
        else
            $usr_city='Astana';

        $page='price';

        return view('price.index', compact(['usr_city','cities','prices', 'whatsapp', 'telegram', 'instagram', 'phone', 'page', 'seos']));
    }
}
