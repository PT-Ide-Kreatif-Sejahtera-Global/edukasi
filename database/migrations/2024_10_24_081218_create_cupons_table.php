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
        Schema::create('cupons', function (Blueprint $table) {
            $table->id(); // Primary key (id)
            $table->string('cupon_code', 250); // Coupon code (varchar)
            $table->string('description', 255); // Description of the coupon (varchar)
            $table->enum('discount_type', ['percentage', 'flat']); // Discount type (enum)
            $table->decimal('discount_value', 8, 2); // Discount value (decimal)
            $table->date('valid_form'); // Valid from date (date)
            $table->date('valid_until'); // Valid until date (date)
            $table->integer('usage_limit'); // Usage limit (integer)
            $table->integer('total_usage'); // Total usage (integer)
            $table->timestamps(); // Laravel created_at and updated_at timestamps
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cupons');
    }
};
