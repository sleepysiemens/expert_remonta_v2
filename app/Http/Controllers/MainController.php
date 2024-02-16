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

    public function form(Request $req)
    {
      $path = parse_url($_SERVER['HTTP_REFERER'])['path'];
      //dd($path);
      //dd($req->all());

      //$formTypeId = FormType::getFormTypeId($req->sourse);
      $formTypeId = FormType::getFormTypeId($path);
      //dd($formTypeId);

        $userIP=$_SERVER['REMOTE_ADDR'];
        $location=Location::get($userIP);

      if(!$req->city) {
        if($location==false)
            $city='not set';
        else {
          $city=$location->cityName;
          if(in_array($city, ['Astana', 'Almaty'])) $req->merge(['city' => $city]);
          else $req->merge(['city' => config('app.city')]);
        }
      }

      $req->merge(['sourse' => $path]);

      $validationRules = [
        'name'=>'required|string', 
        'phone'=>'required|string', 
        'city'=>'required|string', 
        'email'=>'nullable|email',
        'sourse'=>'required'
      ];
      if(in_array($formTypeId, [2, 3])) {
        $validationRules['resume_file'] = 'required|max:8096|mimes:pdf,doc,docx,xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document';
      }
      $data= $req->validate($validationRules);
      //dd($data);
      if(in_array($formTypeId, [2, 3])) {
        //\App\Jobs\StoreFile::dispatch($req->file('resume_file'));
        $path = Storage::put('resumes', $req->file('resume_file'));
        $data['resume_file'] = $path;
      }
        //dd($data);
        //Application::create($req->except('_token'));
        //$application = Application::create($req->all());

        // здесь post запрос в crm
        /*Http::withHeaders([
            'Auth-Key' => env('CRM_AUTH_KEY'),
        ])->post(env('CRM_URL'));*/

        //  отправка почты, тут
        $objDemo = new \stdClass();
        $objDemo->form_type_id = $formTypeId;
        $objDemo->req_data = $req->except('_token');
        //dd($objDemo);
        if($formTypeId == 1) {
          $objDemo->title = 'Новая заявка на услугу';
          $pageUrl = explode('/', $path)[3];
          $category = Category::where(['url' => $pageUrl])->first();
          $objDemo->service = $category->title_ru;
        }
        else if($formTypeId == 2) $objDemo->title = 'Новая заявка на вакансии в офис';
        else if($formTypeId == 3) $objDemo->title = 'Новая заявка на вакансии на объекты';
        else if($formTypeId == 5) $objDemo->title = 'Новая заявка на франшизу';
        else if($formTypeId == 4) {
          if(str_contains($path, 'vacancies')) {
            $vacancyId = 1;
            if($req->vacancy_id) $vacancyId = $req->vacancy_id;
            $vacancy = \App\Models\Vacancy::where(['id' => $vacancyId])->first();
            $objDemo->title = 'Новая заявка на вакансию ' . $vacancy->title_ru;
            $data['vacancy_id'] = $vacancy->id;
          }
          else {
            $pageUrl = explode('/', $path)[2];
            $vacancy = \App\Models\Vacancy::where(['url' => $pageUrl])->first();
            $objDemo->title = 'Новая заявка на вакансию ' . $vacancy->title_ru;
            $data['vacancy_id'] = $vacancy->id;
          }
          $objDemo->vacancy = $vacancy;
        }
        else if($formTypeId == 6) {
          $saleId = 1;
          if($req->sale_id) $saleId = $req->sale_id;
          $sale = \App\Models\Sale::find($saleId);
          $objDemo->title = 'Новая заявка на акцию ' . $sale->title_ru;
          $objDemo->sale = $sale;
          $data['sale_id'] = $sale->id;
        }

        $application = Application::create($data);

        $objDemo->date = $application->date;
        if(in_array($formTypeId, [2, 3])) {
          $objDemo->file = Storage::url('resumes', $application->resume_file);
        }
        $urlParts = parse_url($_SERVER['HTTP_REFERER']);
        //dd($urlParts);
        $objDemo->url = $urlParts['scheme'] . '://' . $urlParts['host'] . $urlParts['path'];
        if($req->vacancy_url) $objDemo->url = $req->vacancy_url;

        $formType = FormType::where(['id' => $formTypeId])->first();
        $emails = config('app.city') === 'Астана' ? $formType->emails : $formType->emails_almaty;
        $emails = preg_split("/\r\n|\n|\r/", $emails);
        //dd($emails);

        foreach($emails as $email) {
          //Mail::to($email)->send(new FormEmail($objDemo));
          Mail::to($email)->queue(new FormEmail($objDemo));
        }
        //$tg->sendMessage(1, (string)view('tg.form'));

        // уведомление о заявке в телеграм, допустим
        $path = parse_url($_SERVER['HTTP_REFERER'])['path'];
        //$path = '/';
        //if($req->sourse !== 'main/sale/') $path = $req->sourse;
        return redirect("$path?from=form");
          //->with('msg', 'Ваша заявка успешно отправлена');
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
