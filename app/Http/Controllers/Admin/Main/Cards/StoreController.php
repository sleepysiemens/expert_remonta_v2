<?php

namespace App\Http\Controllers\Admin\Main\Cards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WelcomeCard;

class StoreController extends Controller
{
    public function index()
    {
        $sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'src'=>(request()->title_ru).'-image.img'];

        $file = request()->file('src');
        $file->move(public_path() . '/img/cards/',request()->title_ru.'-image.img');

        WelcomeCard::create($sql_data);

        return redirect()->route('admin.main.welcome_cards.index');
    }
}
