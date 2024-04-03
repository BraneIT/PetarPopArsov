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
        Schema::create('godisnji_izvjestaji', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file');
            $table->string('slug')->unique();
            $table->integer('category_id');
            $table->string('year');
            $table->timestamps();
        });
         Schema::create('razvojna_programa', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file');
            $table->string('slug')->unique();
            $table->integer('category_id');
            $table->string('year');
            $table->timestamps();
        });
        Schema::create('izvjestaji_od_samoevaluacija', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file');
            $table->string('slug')->unique();
            $table->integer('category_id');
            $table->string('year');
            $table->timestamps();
        });
        Schema::create('integralna_inspekcija', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file');
            $table->string('slug')->unique();
            $table->integer('category_id');
            $table->string('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('godisnji_izvjestaji');
        Schema::dropIfExists('razvojna_programa');
        Schema::dropIfExists('izvjestaji_od_samoevaluacija');
        Schema::dropIfExists('integralna_inspekcija');
    }
};
