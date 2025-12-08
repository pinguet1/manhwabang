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
        Schema::create('genre_manhwa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('manhwa_id')->constrained('manhwas')->cascadeOnDelete();
            $table->foreignId('genre_id')->constrained('genres')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_manhwa');
    }
};
