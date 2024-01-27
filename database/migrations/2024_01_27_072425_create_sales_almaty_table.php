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
        Schema::create('sales_almaty', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //$table->datetime('end_date');
            $table->integer('period')->nullable();
            //$table->string('title');
            //$table->text('description')->nullable();
            $table->text('title_ru');
            $table->text('title_kz')->nullable();
            $table->text('description_ru');
            $table->text('description_kz')->nullable();
            $table->string('src');
            $table->unsignedBigInteger('percent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_almaty');
    }
};
