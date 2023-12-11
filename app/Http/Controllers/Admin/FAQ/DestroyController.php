<?php

namespace App\Http\Controllers\Admin\FAQ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\question;


class DestroyController extends Controller
{
    public function index(Question $question)
    {
        $question->delete();
        return redirect()->route('admin.faq.index');
    }
}
