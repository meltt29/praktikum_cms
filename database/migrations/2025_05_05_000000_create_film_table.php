<?php

use Database\Seeders\FilmSeeder;
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
        Schema::create('film', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('tahun_rilis');
            $table->string('sutradara');
            $table->string('genre');
            $table->string('aktor');
            $table->timestamps();
        });

        $this->callSeeder();
    }

    private function callSeeder(): void
    {
        (new FilmSeeder)->run();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film');
    }
};