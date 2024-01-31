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
        Schema::create('services_almaty', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('url');
            $table->string('src')->nullable();
            $table->text('title_ru');
            $table->text('title_kz')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_kz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_almaty');
    }
};
