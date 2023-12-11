<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Sale;
use App\Models\User;


class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $sales=sale::all();
        $users=User::all();


        return view('admin.user.show', compact(['user', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}