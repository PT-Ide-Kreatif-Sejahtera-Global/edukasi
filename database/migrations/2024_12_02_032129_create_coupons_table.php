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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('coupon_code')->unique();
            $table->enum('discount_type', ['percentage', 'fixed']);
            $table->string('discount_value');
            $table->date('valid_from');
            $table->date('valid_until');
            $table->integer('usage_limit')->nullable();
            $table->integer('total_usage')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
