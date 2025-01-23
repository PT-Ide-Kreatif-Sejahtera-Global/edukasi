<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            'instructor_id' => 1,
            'title' => 'Sample Course',
            'description' => 'This is a sample course description.',
            'price' => 99.99,
            'foto' => 'sample.jpg',
            'is_locked' => false,
            'total_price' => 99.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
