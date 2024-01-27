<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getTable()  {
      return env('APP_CITY') === 'Астана' ? 'sales' : 'sales_almaty';
    }
}
