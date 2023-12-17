<?php

namespace App\Http\Controllers\Admin\Main\Cards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WelcomeCard;


class UpdateController extends Controller
{
    public function index(WelcomeCard $WelcomeCards)
    {

        if(request()->hasFile('src'))
        {
        $file = request()->file('src');
        $file->move(public_path() . '/img/cards/',request()->title_ru.'-image.img');
        $sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'src'=>(request()->title_ru).'-image.img'];
        }
        else
            $sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz];

        $WelcomeCards->update($sql_data);

        return redirect()->route('admin.main.welcome_cards.show', $WelcomeCards->id);
    }
}
