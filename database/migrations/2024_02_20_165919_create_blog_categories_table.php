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
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('name_kz')->nullable();
            $table->string('url');
            $table->string('thumb')->nullable();
            $table->unsignedSmallInteger('parent_id')->nullable();
            $table->string('seo_title_ru')->nullable();
            $table->string('seo_title_kz')->nullable();
            $table->string('meta_desc_ru')->nullable();
            $table->string('meta_desc_kz')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
