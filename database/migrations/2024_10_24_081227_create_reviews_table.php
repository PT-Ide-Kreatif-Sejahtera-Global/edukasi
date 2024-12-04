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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');  // Relasi ke tabel 'courses'
            $table->foreignId('user_id')->constrained()->onDelete('cascade');    // Relasi ke tabel 'users'
            $table->integer('bintang');   // Menggunakan tipe integer untuk rating (bintang)
            $table->text('komentar');     // Menggunakan tipe text untuk komentar
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
