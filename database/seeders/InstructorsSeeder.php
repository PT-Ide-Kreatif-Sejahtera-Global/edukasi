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
        for ($i = 2; $i <= 9; $i++) {
            DB::table('instructors')->insert([
                'user_id' => $i,
                'bio' => 'Keterangan instructor',
            'rating' => 4.5,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }
}
