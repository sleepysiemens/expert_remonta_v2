<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\question;
use App\Models\service;
use App\Models\serviceimage;
use App\Models\Contact;
use App\Models\Sale;
use App\Models\Header;
use App\Models\WelcomeCard;
use App\Models\About;
use App\Models\WhyCard;
use App\Models\MainText;

use Stevebauman\Location\Facades\Location;
use App\Models\Application;
use App\Models\Seo;


class MainController extends Controller
{
    public function index()
    {
        $services=Service::query()->limit(4)->offset(0)->get();
        $questions=Question::all();
        $sales=Sale::all();
        $Headers=Header::all();
        $Abouts=About::all();
        $WelcomeCards=WelcomeCard::all();
        $WhyCards=WhyCard::all();
        $whatsapp=Contact::query()->select('link')->where('name','=','whatsapp')->get();
        $telegram=Contact::query()->select('link')->where('name','=','telegram')->get();
        $instagram=Contact::query()->select('link')->where('name','=','instagram')->get();
        $phone=Contact::query()->select('link')->where('name','=','phone')->get();
        $seos=Seo::query()->where('page','=','main')->get();
        $texts=MainText::all();

        $page='main';

        return view('main.index', compact(['texts','services', 'questions', 'whatsapp', 'telegram', 'instagram', 'phone', 'sales', 'Headers', 'WelcomeCards', 'Abouts', 'WhyCards', 'page', 'seos']));
    }

    public function form()
    {
        $userIP=$_SERVER['REMOTE_ADDR'];
        $location=Location::get($userIP);

        if($location==false)

            $city='not set';
        else
            $city=$location->cityName;

        $data=request()->validate(['name'=>'required|string', 'phone'=>'required|string', 'sourse'=>'required']);
        $sql_data=['username'=>request()->name, 'phone'=>request()->phone, 'sourse'=>request()->sourse, 'city'=>$city, 'created_at'=>date('Y-m-d H:i:s')];
        Application::create($sql_data);

        return redirect('/'.request()->sourse);
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

        //dd($_COOKIE['locale']);
        return redirect('/'.request()->sourse);
    }

    public function city()
    {
        setcookie('city', request()->city, time()+360000 ,'/');
        return redirect('/'.request()->sourse);
    }
}
