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
        Schema::table('seos', function (Blueprint $table) {
            $table->dropColumn('seo');
            $table->dropColumn('meta');
            $table->text('seo_ru');
            $table->text('seo_kz')->nullable();
            $table->text('meta_ru');
            $table->text('meta_kz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
