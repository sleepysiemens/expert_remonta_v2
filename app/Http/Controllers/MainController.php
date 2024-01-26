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
        $homeServices=Service::query()->limit(4)->offset(0)->get();
        $questions=Question::all();
        $sales=Sale::all();
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
      $page='vacanciesLanding';

      return view('main.vacanciesLanding', compact('page'));
    }

    public function vacanciesLanding2() {
      $page='vacanciesLanding2';

      return view('main.vacanciesLanding2', compact('page'));
    }

    public function franchise() {
      $page='franchise';

      return view('main.franchise', compact('page'));
    }

    public function form(Request $req)
    {
      //dd($req->all());
        $userIP=$_SERVER['REMOTE_ADDR'];
        $location=Location::get($userIP);

      if(!$req->city) {
        if($location==false)
            $city='not set';
        else
            $req->city=$location->cityName;
      }
      //dd($req->city);
      //dd($req->all());
        
        $data= $req->validate([
          'name'=>'required|string', 
          'phone'=>'required|string', 
          //'city'=>'required|string', 
          'email'=>'nullable|string',
          'sourse'=>'required'
        ]);
        //dd($data);
        $sql_data=[
          'username'=>$req->name, 
          'phone'=>$req->phone, 
          'sourse'=>$req->sourse, 
          'city'=>$req->city, 
          'date_time'=>date('Y-m-d H:i:s')
        ];
        //dd($sql_data);
        //Application::create($req->except('_token'));
        Application::create($sql_data);

        // здесь post запрос в crm
        /*Http::withHeaders([
            'Auth-Key' => env('CRM_AUTH_KEY'),
        ])->post(env('CRM_URL'));*/

        // уведомление о заявке в телеграм, допустим
        $path = '/';
        if($req->sourse !== 'main/sale/') $path = $req->sourse;
        return redirect($path)->with('msg', 'Ваша заявка успешно отправлена');
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
