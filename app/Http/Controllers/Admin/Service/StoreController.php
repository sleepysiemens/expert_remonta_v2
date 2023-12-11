<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\service;


class StoreController extends Controller
{
    public function __invoke()
    {
        $data=request()->validate(['title'=>'required|string', 'url'=>'required|string', 'description'=>'required|max:1000', 'src'=>'required']);
        $sql_data=['title'=>request()->title, 'url'=>request()->url, 'description'=>request()->description, 'src'=>(request()->title).'-image.img'];

        $file = request()->file('src');
        $file->move(public_path() . '/img/services/',request()->title.'-image.img');

        Service::create($sql_data);

        return redirect()->route('admin.service.index'); 
    }
}
