<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\VacancyCategory;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      //Schema::dropIfExists('vacancy_categories');
        Schema::create('vacancy_categories', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        $values=
            [ ['name'=>'Отделочники'], ['name'=>'Плиточники'],
                ['name'=>'Маляры'],
                ['name'=>'Штукатуры'],
            ];

        foreach ($values as $value)
        {
            VacancyCategory::create($value);

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancy_categories');
    }
};
