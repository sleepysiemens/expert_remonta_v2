<?php

namespace App\Http\Controllers\Admin\Main\Header;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Header;


class UpdateController extends Controller
{
    public function index(Header $header)
    {
      	if(request()->hasFile('src'))
        {
          	$file = request()->file('src');
            $file->move(public_path() . '/img/main_bg/','bg-image.img');
			$sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'subtitle_ru'=>request()->subtitle_ru, 'subtitle_kz'=>request()->subtitle_kz, 'src'=>'/img/main_bg/bg-image.img'];
        }
      	else
        {
			$sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'subtitle_ru'=>request()->subtitle_ru, 'subtitle_kz'=>request()->subtitle_kz];
        }

        $header->update($sql_data);

        return redirect()->route('admin.main.header.show', $header->id);
    }
}
