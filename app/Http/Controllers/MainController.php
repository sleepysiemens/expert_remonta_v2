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

        $page='main';
        
        return view('main.index', compact(['services', 'questions', 'whatsapp', 'telegram', 'instagram', 'phone', 'sales', 'Headers', 'WelcomeCards', 'Abouts', 'WhyCards', 'page', 'seos']));
    }

    public function form()
    {
        $userIP=$_SERVER['REMOTE_ADDR'];
        $location=Location::get($userIP);

        if($location==false)
            
            $city='not set';
        else
            $city=$location->cityName;

        $data=request()->validate(['username'=>'required|string', 'phone'=>'required|string', 'sourse'=>'required']);
        $sql_data=['username'=>request()->username, 'phone'=>request()->phone, 'sourse'=>request()->sourse, 'city'=>$city, 'created_at'=>date('Y-m-d H:i:s')];
        Application::create($sql_data);


        return redirect('/'.request()->sourse); 
    }
}