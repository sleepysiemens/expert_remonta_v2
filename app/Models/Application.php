<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Application extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function getDateAttribute() {
        $date = new Date($this->created_at);
        return $date->format("d F Y H:i");
    }

    public function scopeFiltered(Builder $query): void
    {
      if(request()->query('archive')) $query->where(['active' => false]);
      else $query->where(['active' => true]);

      $query->whereNotIn('city', [env('APP_CITY_OPPOSITE'), env('APP_CITY_OPPOSITE_EN')]);
    }

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }

    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class);
    }

}
