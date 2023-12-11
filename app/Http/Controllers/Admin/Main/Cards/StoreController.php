<?php

namespace App\Http\Controllers\Admin\Main\Cards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WelcomeCard;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data=request()->validate(['title'=>'required|string', 'src'=>'required']);
        $sql_data=['title'=>request()->title, 'src'=>(request()->title).'-image.img'];

        $file = request()->file('src');
        $file->move(public_path() . '/img/cards/',request()->title.'-image.img');
        
        WelcomeCard::create($sql_data);

        return redirect()->route('admin.main.welcome_cards.index'); 
    }
}
