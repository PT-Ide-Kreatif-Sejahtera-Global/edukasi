<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CuponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cupons')->insert([
            [
                'cupon_code' => 'DISCOUNT10',
                'description' => '10% off on all items',
                'discount_type' => 'percentage',
                'discount_value' => 10.00,
                'valid_form' => '2024-01-01',
                'valid_until' => '2024-12-31',
                'usage_limit' => 100,
                'total_usage' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cupon_code' => 'FLAT50',
                'description' => 'Flat $50 off on orders above $500',
                'discount_type' => 'flat',
                'discount_value' => 50.00,
                'valid_form' => '2024-01-01',
                'valid_until' => '2024-12-31',
                'usage_limit' => 50,
                'total_usage' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
