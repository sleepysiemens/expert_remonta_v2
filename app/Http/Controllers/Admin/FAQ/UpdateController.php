<?php

namespace App\Http\Controllers\Admin\FAQ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\question;


class UpdateController extends Controller
{
    public function index(Question $question)
    {
        $data=request()->validate(['question'=>'required|string', 'answer'=>'required|max:1000']);
        $question->update($data);

        return redirect()->route('admin.faq.show', $question->id);
    }
}
