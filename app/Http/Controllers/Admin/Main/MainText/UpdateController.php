<?php

namespace App\Http\Controllers\Admin\Main\MainText;

use App\Http\Controllers\Controller;
use App\Models\MainText;
use Illuminate\Http\Request;

use App\Models\About;


class UpdateController extends Controller
{
    public function index(MainText $text)
    {

        $sql_data=['text_ru'=>request()->text_ru, 'text_kz'=>request()->text_kz];

       	$text->update($sql_data);


        return redirect()->route('admin.main.main_text.show', $text->id);
    }
}
