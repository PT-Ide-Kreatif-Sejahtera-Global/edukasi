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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');  // Relasi ke tabel 'users'
            $table->foreignId('course_id'); // Relasi ke tabel 'courses'
            $table->foreignId('coupon_id')->nullable(); // Relasi ke tabel 'courses'
            $table->string('order_id')->nullable();  // Menggunakan tipe date untuk tanggal pendaftaran
            $table->string('snap_token', 250)->nullable();  // Menggunakan tipe date untuk tanggal pendaftaran
            $table->date('enrollment_date');  // Menggunakan tipe date untuk tanggal pendaftaran
            $table->string('payment_status'); 
            $table->integer('discount_amount'); // Relasi ke tabel 'courses'
            $table->integer('total_price'); // Relasi ke tabel 'courses'
            $table->string('udemy_coupon',250);  // Menggunakan tipe date untuk tanggal pendaftaran
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
