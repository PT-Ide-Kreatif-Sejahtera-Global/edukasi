<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InstructorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('instructors')->insert([
            'user_id' => 1,
            'bio' => Str::random(250),
            'rating' => 4.5,
            'foto' => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
