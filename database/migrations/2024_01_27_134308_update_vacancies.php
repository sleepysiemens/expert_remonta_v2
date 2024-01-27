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
        Schema::table('vacancies', function (Blueprint $table) {
          $table->string('name_kz')->nullable();
          $table->string('seo_title_ru')->nullable();
          $table->string('seo_title_kz')->nullable();
          $table->string('meta_desc_ru')->nullable();
          $table->string('meta_desc_kz')->nullable();
          $table->string('url')->nullable();
          $table->text('overview_kz')->nullable();
          $table->text('offers_kz')->nullable();
          $table->text('requirements_kz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
          $table->dropColumn('name_kz');
          $table->dropColumn('seo_title_ru');
          $table->dropColumn('seo_title_kz');
          $table->dropColumn('meta_desc_ru');
          $table->dropColumn('meta_desc_kz');
          $table->dropColumn('url');
          $table->dropColumn('overview_kz');
          $table->dropColumn('offers_kz');
          $table->dropColumn('requirements_kz');
        });
    }
};
