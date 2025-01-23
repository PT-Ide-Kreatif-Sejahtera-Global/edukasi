<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('course_contents')->insert([
            [
                'course_id' => 1,
                'course_category_id' => 1,
                'section_id' => 1,
                'title' => 'Introduction to Programming',
                'url' => 'http://example.com/intro-to-programming',
                'duration' => 1.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'course_category_id' => 1,
                'section_id' => 2,
                'title' => 'Advanced Programming Concepts',
                'url' => 'http://example.com/advanced-programming',
                'duration' => 2.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
