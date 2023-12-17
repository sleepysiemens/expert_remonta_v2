<?php

namespace App\Http\Controllers\Admin\FAQ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\question;


class UpdateController extends Controller
{
    public function index(Question $question)
    {
        $data=request();
        $question->update($data);

        return redirect()->route('admin.FAQ.show', $question->id);
    }
}
