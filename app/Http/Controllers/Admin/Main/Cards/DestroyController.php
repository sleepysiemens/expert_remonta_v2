<?php

namespace App\Http\Controllers\Admin\Main\Cards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WelcomeCard;


class DestroyController extends Controller
{
    public function index(WelcomeCard $WelcomeCards)
    {
        $WelcomeCards->delete();
        return redirect()->route('admin.main.welcome_cards.index');
    }
}
