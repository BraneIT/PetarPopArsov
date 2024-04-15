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
        Schema::table('prvacinja', function (Blueprint $table) {
            // Delete the column
            $table->dropColumn('content');
            $table->renameColumn('image_path', 'path');
            // Add new columns
            $table->string('type');
            $table->string('year');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prvacinja', function (Blueprint $table) {
            // Add back the deleted column
            $table->string('content');

            // Rename the column back to 'image_path'
            $table->renameColumn('path', 'image_path');

            // Drop the newly added columns
            $table->dropColumn('type');
            $table->dropColumn('year');
        });
    }
};
