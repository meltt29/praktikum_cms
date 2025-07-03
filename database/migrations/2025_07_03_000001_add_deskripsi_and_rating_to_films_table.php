<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('films', function (Blueprint $table) {
            if (!Schema::hasColumn('films', 'deskripsi')) {
                $table->text('deskripsi')->nullable(); // Untuk Oracle, text = CLOB
            }
            if (!Schema::hasColumn('films', 'rating')) {
                $table->float('rating')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('films', function (Blueprint $table) {
            if (Schema::hasColumn('films', 'deskripsi')) {
                $table->dropColumn('deskripsi');
            }
            if (Schema::hasColumn('films', 'rating')) {
                $table->dropColumn('rating');
            }
        });
    }
}; 