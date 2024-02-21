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
        Schema::create('blogs_astana', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('description');
            $table->string('src')->nullable();
            $table->text('title_ru');
            $table->text('title_kz')->nullable();
            $table->text('description_ru');
            $table->text('description_kz')->nullable();
            $table->string('seo_title_ru')->nullable();
            $table->string('seo_title_kz')->nullable();
            $table->string('meta_desc_ru')->nullable();
            $table->string('meta_desc_kz')->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedInteger('category_id');
            $table->string('short_title_ru')->nullable();
            $table->string('short_title_kz')->nullable();
            $table->text('wishes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs_astana');
    }
};
