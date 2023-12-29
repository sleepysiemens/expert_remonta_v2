<?php

namespace App\Http\Controllers\Admin\FAQ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\question;

class StoreController extends Controller
{
    public function index()
    {
        $data=request()->all();
        Question::create($data);

        return redirect()->route('admin.faq.index');
    }
}
