<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VacancyCategory extends Model
{
    use HasFactory;

    public static $experienceList = ['Не имеет значение', '1-3 года', '4-6 лет'];

    protected $guarded=[];

    /*public function getRouteKeyName(): string {
      return 'url';
    }*/

    public function vacancies(): HasMany {
      return $this->hasMany(Vacancy::class, 'category_id', 'id');
  }
}
