<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Vacancy;
use App\Models\VacancyCategory;
use App\Models\Resume;
use App\Models\City;
use App\Models\Seo;

class VacancyController extends Controller
{

    public function index(Request $req) {
      $vacancies = Vacancy::filtered2()->with('city')->with('category')->get();
      $vacancyCategories = VacancyCategory::all();
      //dd($vacancies);
      $page = 'vacancies';
      //dd(Vacancy::all());

      $requestInfo = [];
      if($req->city_select) $requestInfo['city'] = City::find($req->city_select);
      if($req->category_select) $requestInfo['category'] = VacancyCategory::find($req->category_select);
      if($req->exp_select) $requestInfo['exp'] = $req->exp_select;

      $seo = Seo::query()->where('page','=','vacancies')->first();

      return view('vacancies.index', compact('page', 'vacancies', 'vacancyCategories', 'requestInfo', 'seo'));
    }

    public function filter(Request $req) {
      return Vacancy::filtered()->count();
    }

    public function show(Request $req, /*Vacancy $vacancy*/) {
      $page = 'vacancy';
      $vacancy = Vacancy::where(['url' => $req->vacancy])->first();
      if(!$vacancy) abort(404);

      return view('vacancies.show', compact('page', 'vacancy'));
    }

    public function showCategory(Request $req, /*VacancyCategory $vacancyCategory*/) {
      //dd($req->vacancyCategory);
      $page = 'vacancyCategory';

      $vacancyCategory = VacancyCategory::where(['url' => $req->vacancyCategory])->with('vacancies')->first();
      if(!$vacancyCategory) abort(404);

      return view('vacancies.showCategory', compact('page', 'vacancyCategory'));
    }

    public function form(Request $req)
    {
      $req->merge(['city' => config('app.city')]);
      //$req->city = config('app.city');
      //dd($req->all());
        $userIP=$_SERVER['REMOTE_ADDR'];
        //$location=Location::get($userIP);

      /*if(!$req->city) {
        if($location==false)
            $city='not set';
        else
            $req->city=$location->cityName;
      }*/
      //dd($req->city);
        
        $data= $req->validate([
          'fio'=>'required|string', 
          'phone'=>'required|string', 
          //'city'=>'required|string', 
          'email'=>'nullable|string|email',
          //'resume_file'=>'required|mimes:doc,docx,pdf', 
          'resume_file'=>'required|max:8096|mimes:pdf,doc,docx,xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
          'source'=>'required',
          'city'=>'required'
        ]);
        //dd($req->file('resume_file'));
        //dd($data);
        //dd($req->file('resume_file')->hashName());
        $path = Storage::put('resumes', $req->file('resume_file'));
        $data['resume_file'] = $path;
        Resume::create($data);

        //$path = '/';
        //if($req->source !== 'main/sale/') $path = $req->source;
        return redirect()->route("main.".$req->source)->with('msg', 'Ваше резюме успешно отправлено');
    }






}
