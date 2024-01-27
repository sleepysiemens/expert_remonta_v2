<?php

namespace App\Http\Controllers\Admin\Main\Cards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\WelcomeCard;


class UpdateController extends Controller
{
    public function index(WelcomeCard $WelcomeCards)
    {

        if(request()->hasFile('src'))
        {
          @unlink(dirname(__FILE__) . "/../../../../../../public/img/cards/" . $WelcomeCards->src);
          $file = request()->file('src');
          $name= Str::random(8) . "_" . $file->hashName();
          $file->move(public_path() . '/img/cards/', $name);
        $sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'src'=>$name];
        }
        else
            $sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz];

        $WelcomeCards->update($sql_data);

        return redirect()->route('admin.main.welcome_cards.show', $WelcomeCards->id);
    }
}
