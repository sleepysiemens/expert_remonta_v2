<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\service;


class StoreController extends Controller
{
    public function index()
    {
        $sql_data=request()->all();

        $file = request()->file('src');
        $name= Str::random(8) . "_" . $file->hashName();
        $file->move(public_path() . '/img/services/',$name);
        unset($sql_data['src']);
        $sql_data['src'] = $name;

        Service::create($sql_data);

        return redirect()->route('admin.service.index');
    }
}
