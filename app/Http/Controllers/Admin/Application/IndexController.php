<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\Application;


class IndexController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $applications=application::with('sale')->with('vacancy')->with('page.service')
        ->filtered()
        ->latest()->get();
        //dd($applications);
        //dd($applications[2]->vacancy);

        //dd(request()->getHttpHost());
        $oppositeDomain = 'expertremonta.kz';
        if(config('app.city') === 'Алматы') $oppositeDomain = 'astana.expertremonta.kz';

        return view('admin.application.index', compact(['oppositeDomain', 'reviews', 'questions', 'services', 'categories', 'sales', 'applications']));
    }

    public function archive(Application $application)
    {
        $application->active = false;
        $application->update();
        return redirect()->route('admin.application.index')->with('msg', 'Заявка отправлена в архив');
    }
}
