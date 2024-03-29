<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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

    public function scopeFiltered(Builder $query): void
    {
      if(request()->city_id) $query->where('city_id', '=', request()->city_id);
      if(request()->category_id) $query->where('category_id', '=', request()->category_id);
      /*if(request()->exp) {
        if(request()->exp !== 'Не имеет значения') $query->where('experience', '=', request()->exp);
        else $query->where('experience', '=', 'Без опыта');
      }*/
    }

    public function scopeFiltered2(Builder $query): void
    {
      if(request()->city_select) $query->where('city_id', '=', request()->city_select);
      else {
        config('app.city') === 'Астана' 
          ? $query->where('city_id', '=', 2)
          : $query->where('city_id', '=', 1);
      }
      if(request()->category_select) $query->where('category_id', '=', request()->category_select);
      /*if(request()->exp_select) {
        if(request()->exp_select !== 'Не имеет значения') $query->where('experience', '=', request()->exp_select);
        else $query->where('experience', '=', 'Без опыта');
      }*/
    }
}
