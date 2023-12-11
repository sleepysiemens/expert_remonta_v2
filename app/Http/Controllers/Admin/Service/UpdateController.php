<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\service;


class UpdateController extends Controller
{
    public function __invoke(Service $service)
    {
        $data=request()->validate(['title'=>'required|string', 'url'=>'required|string', 'description'=>'required|max:1000', 'src']);

        if(request()->hasFile('src'))
        {
            $file = request()->file('src');
            $file->move(public_path() . '/img/services/',request()->title.'-image.img');
            $sql_data=['title'=>request()->title, 'url'=>request()->url, 'description'=>request()->description, 'src'=>(request()->title).'-image.img'];
        }
        else
            $sql_data=['title'=>request()->title, 'url'=>request()->url, 'description'=>request()->description];


        $service->update($sql_data);

        return redirect()->route('admin.service.show', $service->id); 
    }
}
