<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\question;
use App\Models\service;
use App\Models\category;
use App\Models\Contact;
use App\Models\Sale;


class ShowController extends Controller
{
    public function index(Contact $contact)
    {
        $reviews=Review::all();
        $questions=Question::all();
        $services=Service::all();
        $categories=Category::all();
        $contacts=Contact::all();
        $sales=sale::all();


        return view('admin.contact.show', compact(['contact', 'reviews', 'questions', 'services', 'categories', 'sales']));
    }
}
