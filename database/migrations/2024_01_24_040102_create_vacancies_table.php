<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedTinyInteger('category_id');
            $table->string('name');
            $table->enum('experience', ['Без опыта', '1-3 года', '4-6 лет', '7-10 лет']);
            $table->enum('employment_type', ['Полная', 'Частичная']);
            $table->unsignedInteger('salary_from')->nullable();
            $table->unsignedInteger('salary_to')->nullable();
            $table->string('phone')->nullable();
            $table->text('overview')->nullable();
            $table->text('offers')->nullable();
            $table->text('requirements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
