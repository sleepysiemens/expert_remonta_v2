<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Seo;
use App\Models\City;
use Stevebauman\Location\Facades\Location;



class GalleryController extends Controller
{
    public function index()
    {
        $galleries=Gallery::all();
        $whatsapp=Contact::query()->select('link')->where('name','=','whatsapp')->get();
        $telegram=Contact::query()->select('link')->where('name','=','telegram')->get();
        $instagram=Contact::query()->select('link')->where('name','=','instagram')->get();
        $phone=Contact::query()->select('link')->where('name','=','phone')->get();
        $seos=Seo::query()->where('page','=','gallery')->get();
        $cities=City::all();

        $userIP=$_SERVER['REMOTE_ADDR'];
        $location=Location::get($userIP);
        if($location!=false)
            $usr_city=$location->cityName;
        else
            $usr_city='Astana';

        $page='gallery';

        return view('gallery.index', compact(['usr_city','cities','galleries','whatsapp', 'telegram', 'instagram', 'phone', 'page', 'seos']));
    }
}
