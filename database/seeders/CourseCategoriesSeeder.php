<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_categories')->insert([
            ['category_name' => 'Science'],
            ['category_name' => 'Mathematics'],
            ['category_name' => 'History'],
            ['category_name' => 'Literature'],
            ['category_name' => 'Art'],
        ]);
    }
}
