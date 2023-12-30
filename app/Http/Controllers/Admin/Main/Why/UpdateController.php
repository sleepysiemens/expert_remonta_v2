<?php

namespace App\Http\Controllers\Admin\Main\Why;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WhyCard;


class UpdateController extends Controller
{
    public function index(WhyCard $WhyCards)
    {


        $sql_data=['title_ru'=>request()->title_ru, 'subtitle_ru'=>request()->subtitle_ru, 'title_kz'=>request()->title_kz, 'subtitle_kz'=>request()->subtitle_kz];

        $WhyCards->update($sql_data);

        return redirect()->route('admin.main.why_cards.show', $WhyCards->id);
    }
}
