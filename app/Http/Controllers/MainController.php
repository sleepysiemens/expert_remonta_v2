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

class MainController extends Controller
{
    public function index(Request $req)
    {
      //dd($req->all());
        $services=Service::query()->limit(4)->offset(0)->get();
        $questions=Question::all();
        $sales=Sale::all();
        $Headers=Header::all();
        $Abouts=About::all();
        $WelcomeCards=WelcomeCard::all();
        $WhyCards=WhyCard::all();
        $seos=Seo::query()->where('page','=','main')->get();
        $texts=MainText::all();

        $page='main';

        return view('main.index', compact(['texts','services', 'questions', 'sales', 'Headers', 'WelcomeCards', 'Abouts', 'WhyCards', 'page', 'seos']));
    }

    public function franchise() {
      $page='franchise';

      return view('main.franchise', compact('page'));
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

        // здесь post запрос в crm
        /*Http::withHeaders([
            'Auth-Key' => env('CRM_AUTH_KEY'),
        ])->post(env('CRM_URL'));*/

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
        if(request()->all()['page']!='main')
            $page='/'.request()->all()['page'];
        else
            $page='/';

        return redirect($page);
    }

    public function city(Request $req)
    {
        //setcookie('city', $req->city, time()+360000 ,'/');
        //$cookie = cookie('city', $req->city, 360000);
        //Cookie::queue('city', $req->city, 360000);

        if($req->all()['page']!='main')
            $page='/'.$req->all()['page'];
        else
            $page='/';

        // проблема в том что невозможно записать куку пока ты в приложении на другом домене
        if(request()->city=='Астана') {
          $page='http://astana.expertremonta.kz'.$page;
          //Cookie::queue('city', $req->city, 360000, '/', 'astana.expertremonta.kz');
          Cookie::queue('city', $req->city, 360000, '/', '.expertremonta.kz');
        }
        elseif(request()->city=='Алматы') {
            $page='http://almaty.expertremonta.kz'.$page;
          //Cookie::queue('city', $req->city, 360000, '/', 'almaty.expertremonta.kz');
          Cookie::queue('city', $req->city, 360000, '/', '.expertremonta.kz');
        }

        return redirect($page);//->cookie($cookie);
    }
}
