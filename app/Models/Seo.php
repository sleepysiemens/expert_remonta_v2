<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getTable()  {
        return config('app.city') === 'Астана' ? 'seos' : 'seos_almaty';
    }

}
