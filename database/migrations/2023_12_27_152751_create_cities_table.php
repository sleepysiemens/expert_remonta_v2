<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\City;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('city');
        });
        $cities=
            [
                'Алматы',
                'Астана',
                'Шымкент',
                'Тараз',
                'Экибастуз',
                'Актау',
                'Актобе',
                'Атырау',
                'Караганда',
                'Кокшетау',
                'Костанай',
                'Петропавловск',
                'Павлодар',
                'Темиртау',
                'Семей',
                'Кызылорда',
                'Талдыкорган',
                'Рудный',
                'Туркестан',
                'Уральск',
                'Усть-Каменогорск'
            ];
        foreach ($cities as $city)
        {
            $data=['city'=>$city];
            City::create($data);

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
