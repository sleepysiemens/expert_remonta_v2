<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\question;
use App\Models\service;
use App\Models\serviceimage;
use App\Models\Sale;
use App\Models\Header;
use App\Models\WelcomeCard;
use App\Models\About;
use App\Models\WhyCard;
use App\Models\MainText;
use Illuminate\Support\Facades\Cookie;

use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Application;
use App\Models\Seo;
use App\Models\FormType;
use App\Models\category;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\FormEmail;

class MainController extends Controller
{
    public function index(Request $req)
    {
      //dd($req->all());
        $homeServices=Service::query()->limit(4)->offset(0)->get();
        $questions=Question::all();
        $sales=Sale::active()->get();
        $Headers=Header::all();
        $Abouts=About::all();
        $WelcomeCards=WelcomeCard::all();
        $WhyCards=WhyCard::all();
        $seos=Seo::query()->where('page','=','main')->get();
        $texts=MainText::all();

        $page='main';

        return view('main.index', compact(['texts','homeServices', 'questions', 'sales', 'Headers', 'WelcomeCards', 'Abouts', 'WhyCards', 'page', 'seos']));
    }

    public function vacanciesLanding() {
      $page='vacancies-landing';
      $seo = Seo::query()->where('page','=',$page)->first();

      return view('main.vacanciesLanding', compact('page', 'seo'));
    }

    public function vacanciesLanding2() {
      $page='vacancies-landing2';
      $seo = Seo::query()->where('page','=',$page)->first();

      return view('main.vacanciesLanding2', compact('page', 'seo'));
    }

    public function franchise() {
      $seo = Seo::query()->where('page','=','franchise')->first();
      $page='franchise';

      return view('main.franchise', compact('page', 'seo'));
    }


    public function locale()
    {
        if(!isset($_COOKIE['locale']))
        {
            setcookie('locale','kz', time()+360000 ,'/');
        }
        else
        {
            if($_COOKIE['locale']=='ru')
                setcookie('locale','kz', time()+360000 ,'/');

            if($_COOKIE['locale']=='kz')
                setcookie('locale','ru', time()+360000 ,'/');
        }

        $page = parse_url($_SERVER['HTTP_REFERER'])['path'];

        return redirect($page);
    }

    public function city(Request $req)
    {
        //setcookie('city', $req->city, time()+360000 ,'/');
        //$cookie = cookie('city', $req->city, 360000);
        //Cookie::queue('city', $req->city, 360000);

        $page = parse_url($_SERVER['HTTP_REFERER'])['path'];
        // нужна доп логика, если на страницах статей, то лучше редирект на главную
        // если есть элемент с индексом 3 то мы на страницах статей услуг
        $pathParts = explode('/', $page);
        //if(isset($pathParts[3]) && str_contains($page, 'uslugi')) $page = '/';
        if(str_contains($page, 'uslugi')) $page = '/';

        // проблема в том что невозможно записать куку пока ты в приложении на другом домене
        if(request()->city=='Астана') {
          $page='http://astana.expertremonta.kz'.$page;
          //Cookie::queue('city', $req->city, 360000, '/', 'astana.expertremonta.kz');
          Cookie::queue('city', $req->city, 360000, '/', '.expertremonta.kz');
        }
        elseif(request()->city=='Алматы') {
            //$page='http://almaty.expertremonta.kz'.$page;
            $page='http://expertremonta.kz'.$page;
          //Cookie::queue('city', $req->city, 360000, '/', 'almaty.expertremonta.kz');
          Cookie::queue('city', $req->city, 360000, '/', '.expertremonta.kz');
        }

        return redirect($page);//->cookie($cookie);
    }
}
