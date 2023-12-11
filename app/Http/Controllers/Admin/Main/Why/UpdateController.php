<?php

namespace App\Http\Controllers\Admin\Main\Why;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WhyCard;


class UpdateController extends Controller
{
    public function __invoke(WhyCard $WhyCards)
    {
        $data=request()->validate(['title'=>'required|string', 'subtitle'=>'required|string', 'src']);

        if(request()->hasFile('src'))
        {
        $file = request()->file('src');
        $file->move(public_path() . '/img/icons/',request()->title.'-image.img');
        $sql_data=['title'=>request()->title, 'subtitle'=>request()->subtitle, 'src'=>(request()->title).'-image.img'];
        }
        else
            $sql_data=['title'=>request()->title, 'subtitle'=>request()->subtitle];

        $WhyCards->update($sql_data);

        return redirect()->route('admin.main.why_cards.show', $WhyCards->id); 
    }
}
