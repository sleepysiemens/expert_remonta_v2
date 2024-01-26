<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Vacancy;
use App\Models\VacancyCategory;
use App\Models\Resume;

class VacancyController extends Controller
{

    public function index(Request $req) {
      $vacancies = Vacancy::with('city')->with('category')->get();
      $vacancyCategories = VacancyCategory::all();
      //dd($vacancies);
      $page = 'vacancies';

      return view('vacancies.index', compact('page', 'vacancies', 'vacancyCategories'));
    }

    public function show(Request $req, Vacancy $vacancy) {
      $page = 'vacancy';

      return view('vacancies.show', compact('page', 'vacancy'));
    }

    public function form(Request $req)
    {
      $req->merge(['city' => env('APP_CITY')]);
      //$req->city = env('APP_CITY');
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
