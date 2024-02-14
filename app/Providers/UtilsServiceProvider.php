<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UtilsServiceProvider extends ServiceProvider
{

  public function register(): void {
    require_once base_path().'/app/Utils/global.php';
  }
}