<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Seo;



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


        $page='gallery';

        return view('gallery.index', compact(['galleries','whatsapp', 'telegram', 'instagram', 'phone', 'page', 'seos']));
    }
}