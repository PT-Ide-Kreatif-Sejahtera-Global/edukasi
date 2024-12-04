<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('learning_progress', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // Foreign key to courses
            $table->foreignId('course_content_id')->constrained('course_contents')->onDelete('cascade'); // Foreign key to courses_content
            $table->boolean('is_completed')->default(false);
            $table->date('completed_date')->nullable();
            $table->integer('time_spent')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_progress');
    }
};
