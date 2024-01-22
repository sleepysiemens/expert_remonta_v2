<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\DynamicPage;



class DynamicPageController extends Controller
{

  /* DynamicPage $page */
    public function update(Request $req)
    {
      //return $req->all();
      //return $req->html;
      $page = DynamicPage::where(['url' => $req->page])->first();
      $sql_data = ['html' => $req->html];

      $page->update($sql_data);

      return 'OK';
    }
}
