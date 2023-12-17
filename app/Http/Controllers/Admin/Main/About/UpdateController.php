<?php

namespace App\Http\Controllers\Admin\Main\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\About;


class UpdateController extends Controller
{
    public function index(About $about)
    {
		if(request()->hasFile('src'))
        {
        	$file = request()->file('src');
        	$file->move(public_path() . '/img/about/','about-image.img');
            $sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'src'=>'about-image.img'];

        }
      	else
        {
			$sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz,];
        }
       	$about->update($sql_data);


        return redirect()->route('admin.main.about.show', $about->id);
    }
}
