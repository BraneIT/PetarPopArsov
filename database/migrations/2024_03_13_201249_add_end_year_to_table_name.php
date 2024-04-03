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
        Schema::table('finansiski_dokumenti', function (Blueprint $table) {
            $table->string('end_year')->nullable();
        });
        Schema::table('godisnji_izvjestaji', function (Blueprint $table) {
            $table->string('end_year')->nullable();
        });
        Schema::table('integralna_inspekcija', function (Blueprint $table) {
            $table->string('end_year')->nullable();
        });
        Schema::table('izvjestaji_od_samoevaluacija', function (Blueprint $table) {
            $table->string('end_year')->nullable();
        });
        Schema::table('razvojna_programa', function (Blueprint $table) {
            $table->string('end_year')->nullable();
        });
        Schema::table('takmicenja', function (Blueprint $table) {
            $table->string('end_year')->nullable();
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_name', function (Blueprint $table) {
            //
        });
    }
};
