<?php

namespace App\Http\Controllers\Admin\Main\Why;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WhyCard;


class DestroyController extends Controller
{
    public function __invoke(WhyCard $WhyCards)
    {
        $WhyCards->delete();
        return redirect()->route('admin.main.why_cards.index'); 
    }
}
