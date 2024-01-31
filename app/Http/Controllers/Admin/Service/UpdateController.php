<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\service;


class UpdateController extends Controller
{
    public function index(Service $service)
    {
        if(request()->hasFile('src'))
        {
            @unlink(dirname(__FILE__) . "/../../../../../public/img/services/" . $service->src);
            $sql_data=request()->all();
            $file = request()->file('src');
            $name= Str::random(8) . "_" . $file->hashName();
            $file->move(public_path() . '/img/services/',$name);
            unset($sql_data['src']);
            $sql_data['src'] = $name;           
        }
        else $sql_data = request()->except('src');
            //$sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'url'=>request()->url, 'description_ru'=>request()->description_ru, 'description_kz'=>request()->description_kz];


        $service->update($sql_data);

        return redirect()->route('admin.service.show', $service->id);
    }
}
