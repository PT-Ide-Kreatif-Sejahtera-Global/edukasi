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
        Schema::create('course_contents', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // Foreign key to courses
            $table->foreignId('course_category_id')->constrained()->onDelete('cascade'); // Foreign key to courses_category
            $table->foreignId('course_section_id')->constrained()->onDelete('cascade'); // Foreign key to courses_section
            $table->string('title');
            $table->string('url');
            $table->decimal('duration', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_contents');
    }
};
