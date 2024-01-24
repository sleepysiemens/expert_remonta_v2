<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class service extends Model
{
    use HasFactory;
    protected $guarded=[];

    // оптимизация чтобы не брать весь контент
    public function categories(): HasMany {
        return $this->hasMany(category::class)->select(['id', 'url', 'title_ru', 'title_kz', 'service_id']);
    }

}
