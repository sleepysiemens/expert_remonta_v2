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
use Stevebauman\Location\Facades\Location;



class UslugiController extends Controller
{
    public function index()
    {
        $Headers=Header::all();
        $WelcomeCards=WelcomeCard::all();
        $services=Service::all();
        $reviews=Review::all();

        $seos=Seo::query()->where('page','=','uslugi')->get();

        $page='uslugi';

        return view('uslugi.index', compact(['services', 'reviews', 'Headers', 'WelcomeCards', 'page', 'seos']));
    }

    public function service($service)
    {
        $Headers=Header::all();
        $WelcomeCards=WelcomeCard::all();
        $service= Service::query()->where(['url'=>$service])->first();
        //dd($services[0]->id);
        //$categories= Category::query()->join('services', 'services.id', '=', 'categories.service_id')->where(['services.url'=>$service])->select('categories.*','services.url AS service_url')->get();
        if(!$service) abort(404);
        $categories = Category::active()->where(['service_id' => $service->id])->with('service')->get();
        $reviews=Review::all();
        //$seos=Seo::query()->where('page','=','uslugi/'.$service->url)->get();
        $ServiceImages=ServiceImage::query()->join('services', 'services.id', '=', 'service_images.service_id')->where(['services.url'=>$service])->select('service_images.src')->get();

        $page='uslugi/'.$service;

        return view('service.index', compact(['ServiceImages','service','categories', 'reviews', 'Headers', 'WelcomeCards', 'page']));
    }

    public function category($service, $category)
    {
      //dd($category);
        //event('postHasViewed', $category);

        $Headers=Header::all();
        $WhyCards=WhyCard::all();
        $WelcomeCards=WelcomeCard::all();
        //$category= Category::query()->join('services', 'services.id', '=', 'categories.service_id')->where(['categories.url'=>$category])->select('categories.*','services.url AS service_url','services.title_ru AS service_title_ru','services.title_kz AS service_title_kz')->limit(1)->first();
        $category = Category::active()->where(['url' => $category])->with('service')->first();
        //dd($category);
        if(!$category) abort(404);
        //dd($categories[0]);
        $reviews=Review::all();
        $CategoryImages=CategoryImage::query()->where(['category_id'=>$category->id])->select('src', 'category_id', 'alt')->get();
        //$seos=Seo::query()->where('page','=','uslugi/'.$service.'/'.$category)->get();


        $page='uslugi/'.$service.'/'.$category->url;
        //dd($page);


        return view('category.index', compact(['category', 'reviews', 'Headers', 'WelcomeCards', 'WhyCards', 'page', 'CategoryImages']));
    }
}
