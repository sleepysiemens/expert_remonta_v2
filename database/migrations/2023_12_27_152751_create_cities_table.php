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
            $table->string('city_en')->nullable();
        });
        $cities=
            [
                ['city'=>'Алматы','city_en'=>'Almaty'],
                ['city'=>'Астана','city_en'=>'Astana'],
                ['city'=>'Шымкент','city_en'=>'Shymkent'],
                ['city'=>'Тараз','city_en'=>'Taraz'],
                ['city'=>'Экибастуз','city_en'=>'Ekibastuz'],
                ['city'=>'Актау','city_en'=>'Aktau'],
                ['city'=>'Актобе','city_en'=>'Aktobe'],
                ['city'=>'Атырау','city_en'=>'Atyrau'],
                ['city'=>'Караганда','city_en'=>'Karaganda'],
                ['city'=>'Кокшетау','city_en'=>'Kokshetau'],
                ['city'=>'Костанай','city_en'=>'Kostanay'],
                ['city'=>'Петропавловск','city_en'=>'Petropavlovsk'],
                ['city'=>'Павлодар','city_en'=>'Pavlodar'],
                ['city'=>'Темиртау','city_en'=>'Temirtau'],
                ['city'=>'Семей','city_en'=>'Semey'],
                ['city'=>'Кызылорда','city_en'=>'Kyzylorda'],
                ['city'=>'Талдыкорган','city_en'=>'Taldykorgan'],
                ['city'=>'Рудный','city_en'=>'Rudny'],
                ['city'=>'Туркестан','city_en'=>'Turkestan'],
                ['city'=>'Уральск','city_en'=>'Uralsk'],
                ['city'=>'Усть-Каменогорск','city_en'=>'Ust-Kamenogorsk']
            ];

        foreach ($cities as $city)
        {
            $data=['city'=>$city['city'], 'city_en'=>$city['city_en']];
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
