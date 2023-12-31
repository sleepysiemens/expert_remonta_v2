<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ServiceImage;
use Illuminate\Http\Request;

use App\Models\service;
use App\Models\Review;
use App\Models\category;
use App\Models\CategoryImage;
use App\Models\Contact;
use App\Models\Header;
use App\Models\WelcomeCard;
use App\Models\WhyCard;
use App\Models\Seo;
use App\Models\Blog;
use App\Models\City;
use App\Models\VisitsCount;



class UslugiController extends Controller
{
    public function index()
    {
        $Headers=Header::all();
        $WelcomeCards=WelcomeCard::all();
        $services=Service::all();
        $reviews=Review::all();
        $whatsapp=Contact::query()->select('link')->where('name','=','whatsapp')->get();
        $telegram=Contact::query()->select('link')->where('name','=','telegram')->get();
        $instagram=Contact::query()->select('link')->where('name','=','instagram')->get();
        $phone=Contact::query()->select('link')->where('name','=','phone')->get();
        $seos=Seo::query()->where('page','=','uslugi')->get();
        $cities=City::all();


        $page='uslugi';

        return view('uslugi.index', compact(['cities','services', 'reviews', 'whatsapp', 'telegram', 'instagram', 'phone', 'Headers', 'WelcomeCards', 'page', 'seos']));
    }

    public function service($service)
    {
        $Headers=Header::all();
        $WelcomeCards=WelcomeCard::all();
        $services= Service::query()->where(['url'=>$service])->get();
        $categories= Category::query()->join('services', 'services.id', '=', 'categories.service_id')->where(['services.url'=>$service])->select('categories.*','services.url AS service_url')->get();
        $reviews=Review::all();
        $whatsapp=Contact::query()->select('link')->where('name','=','whatsapp')->get();
        $telegram=Contact::query()->select('link')->where('name','=','telegram')->get();
        $instagram=Contact::query()->select('link')->where('name','=','instagram')->get();
        $phone=Contact::query()->select('link')->where('name','=','phone')->get();
        $seos=Seo::query()->where('page','=','uslugi/'.$service)->get();
        $ServiceImages=ServiceImage::query()->join('services', 'services.id', '=', 'service_images.service_id')->where(['services.url'=>$service])->select('service_images.src')->get();
        $cities=City::all();


        $page='uslugi/'.$service;

        return view('service.index', compact(['cities','ServiceImages','services','categories', 'reviews', 'whatsapp', 'telegram', 'instagram', 'phone', 'Headers', 'WelcomeCards', 'page', 'seos']));
    }

    public function category($service, $category)
    {
        //event('postHasViewed', $category);

        $Headers=Header::all();
        $WhyCards=WhyCard::all();
        $WelcomeCards=WelcomeCard::all();
        $categories= Category::query()->join('services', 'services.id', '=', 'categories.service_id')->where(['categories.url'=>$category])->select('categories.*','services.url AS service_url','services.title_ru AS service_title_ru','services.title_kz AS service_title_kz')->limit(1)->get();
        $reviews=Review::all();
        $whatsapp=Contact::query()->select('link')->where('name','=','whatsapp')->get();
        $telegram=Contact::query()->select('link')->where('name','=','telegram')->get();
        $instagram=Contact::query()->select('link')->where('name','=','instagram')->get();
        $phone=Contact::query()->select('link')->where('name','=','phone')->get();
        $CategoryImages=CategoryImage::query()->where(['category_id'=>$categories[0]->id])->select('category_images.src', 'category_images.category_id')->get();
        $seos=Seo::query()->where('page','=','uslugi/'.$service.'/'.$category)->get();
        $cities=City::all();


        $page='uslugi/'.$service.'/'.$category;



        return view('category.index', compact(['cities','categories', 'reviews', 'whatsapp', 'telegram', 'instagram', 'phone', 'Headers', 'WelcomeCards', 'WhyCards', 'page', 'CategoryImages', 'seos']));
    }
}
