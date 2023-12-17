<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\category;


class UpdateController extends Controller
{
    public function index(Category $category)
    {
        if(request()->hasFile('src'))
        {
            $file = request()->file('src');
            $file->move(public_path() . '/img/categories/',request()->title.'-image.img');
            $sql_data=['title_ru'=>request()->title_ru, 'title_kz'=>request()->title_kz, 'url'=>request()->url, 'description_ru'=>htmlspecialchars(request()->description_ru, ENT_QUOTES), 'description_kz'=>htmlspecialchars(request()->description_kz, ENT_QUOTES), 'src'=>(request()->title).'-image.img', 'service_id'=>request()->service_id];
        }
        else
            $sql_data=['title'=>request()->title, 'url'=>request()->url, 'description'=>request()->description, 'service_id'=>request()->service_id];

        $category->update($sql_data);

        return redirect()->route('admin.category.show', $category->id);
    }
}
