<?php

namespace App\Http\Controllers\Admin\Main\Header;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Header;


class UpdateController extends Controller
{
    public function index(Header $header)
    {
      	if(request()->hasFile('src'))
        {
          	$file = request()->file('src');
            $name= Str::random(8) . "_" . $file->hashName();
            $file->move(public_path() . '/img/main_bg/', $name);
            //$file->move(public_path() . '/img/main_bg/','bg-image.img');
			      $sql_data=[
              'title_ru'=>request()->title_ru, 
              'title_kz'=>request()->title_kz, 
              'subtitle_ru'=>request()->subtitle_ru, 
              'subtitle_kz'=>request()->subtitle_kz, 
              //'src'=>'/img/main_bg/bg-image.img'
              'src' => $name
            ];
        }
      	else
        {
			$sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'subtitle_ru'=>request()->subtitle_ru, 'subtitle_kz'=>request()->subtitle_kz];
        }

          if(!isset(request()->all()['blur']))
              $sql_data['blur']=0;
          else
              $sql_data['blur']=1;


        $header->update($sql_data);

        return redirect()->route('admin.main.header.show', $header->id);
    }
}
