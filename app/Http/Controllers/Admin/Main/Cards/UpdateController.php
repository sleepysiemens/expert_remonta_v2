<?php

namespace App\Http\Controllers\Admin\Main\Cards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WelcomeCard;


class UpdateController extends Controller
{
    public function __invoke(WelcomeCard $WelcomeCards)
    {
        $data=request()->validate(['title'=>'required|string', 'src']);

        if(request()->hasFile('src'))
        {
        $file = request()->file('src');
        $file->move(public_path() . '/img/cards/',request()->title.'-image.img');
        $sql_data=['title'=>request()->title, 'src'=>(request()->title).'-image.img'];
        }
        else
            $sql_data=['title'=>request()->title];

        $WelcomeCards->update($sql_data);

        return redirect()->route('admin.main.welcome_cards.show', $WelcomeCards->id); 
    }
}
