<?php

namespace App\Http\Controllers\Admin\Main\Cards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\WelcomeCard;

class StoreController extends Controller
{
    public function index()
    {

        $file = request()->file('src');
        $name= Str::random(8) . "_" . $file->getClientOriginalName();
        $file->move(public_path() . '/img/cards/', $name);

        $sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'src'=> $name];

        WelcomeCard::create($sql_data);

        return redirect()->route('admin.main.welcome_cards.index');
    }
}
