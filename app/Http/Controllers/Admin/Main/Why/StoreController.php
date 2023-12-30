<?php

namespace App\Http\Controllers\Admin\Main\Why;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WhyCard;

class StoreController extends Controller
{
    public function index()
    {
        $sql_data=['title_ru'=>request()->title_ru, 'subtitle_ru'=>request()->subtitle_ru, 'title_kz'=>request()->title_kz, 'subtitle_kz'=>request()->subtitle_kz];

        WhyCard::create($sql_data);

        return redirect()->route('admin.main.why_cards.index');
    }
}
