<?php

namespace App\Http\Controllers\Admin\Main\Header;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Header;


class UpdateController extends Controller
{
    public function __invoke(Header $header)
    {
        $data=request()->validate(['title'=>'required|string', 'subtitle'=>'required|string', 'src']);
		
      	if(request()->hasFile('src'))
        {
          	$file = request()->file('src');
            $file->move(public_path() . '/img/main_bg/','bg-image.img');
			$sql_data=['title'=>request()->title, 'subtitle'=>request()->subtitle, 'src'=>'/img/main_bg/bg-image.img'];
        }
      	else
        {
			$sql_data=['title'=>request()->title, 'subtitle'=>request()->subtitle];
        }
      
        $header->update($sql_data);

        return redirect()->route('admin.main.header.show', $header->id); 
    }
}