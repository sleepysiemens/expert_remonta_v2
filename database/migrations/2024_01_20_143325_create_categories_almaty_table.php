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
        Schema::create('categories_almaty', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->string('title');
          $table->string('url');
          $table->text('description');
          $table->unsignedinteger('service_id');
          $table->string('src')->nullable();
          $table->text('title_ru');
          $table->text('title_kz')->nullable();
          $table->text('description_ru');
          $table->text('description_kz')->nullable();
          $table->integer('visits_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_almaty');
    }
};
