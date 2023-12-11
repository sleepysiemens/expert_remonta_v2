<?php

namespace App\Http\Controllers\Admin\Main\Why;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WhyCard;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data=request()->validate(['title'=>'required|string', 'subtitle'=>'required|string', 'src'=>'required']);
        $sql_data=['title'=>request()->title, 'subtitle'=>request()->subtitle, 'src'=>(request()->title).'-image.img'];

        $file = request()->file('src');
        $file->move(public_path() . '/img/icons/',request()->title.'-image.img');
        
        WhyCard::create($sql_data);

        return redirect()->route('admin.main.why_cards.index'); 
    }
}
