<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Review extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getLocalDateAttribute() {
        $date = new Date($this->created_at);
        return $date->format("d F Y");
    }
}
