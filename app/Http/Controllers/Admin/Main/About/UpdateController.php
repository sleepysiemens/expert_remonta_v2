<?php

namespace App\Http\Controllers\Admin\Main\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\About;


class UpdateController extends Controller
{
    public function __invoke(About $about)
    {
        //$data=request()->validate(['title'=>'required', 'src'=>'required']);
      
		if(request()->hasFile('src'))
        {
        	$file = request()->file('src');
        	$file->move(public_path() . '/img/about/','about-image.img');
            $sql_data=['title'=>request()->title, 'src'=>'about-image.img'];

        }
      	else
        {
			$sql_data=['title'=>request()->title];
        }
       	$about->update($sql_data);


        return redirect()->route('admin.main.about.show', $about->id); 
    }
}