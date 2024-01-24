<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacancy extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function city(): BelongsTo {
      return $this->belongsTo(City::class);
    }

    public function category(): BelongsTo {
      return $this->belongsTo(VacancyCategory::class);
    }
}
