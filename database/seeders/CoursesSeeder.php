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
            'title' => 'Belajar Parenting dan Komunikasi dengan Anak Sesuai Usia',
            'description' => 'This is a sample course description.',
            'price' => 99.99,
            'url' => 'https://www.udemy.com/course/belajar-parenting-dan-komunikasi-dengan-anak-sesuai-usia/?referralCode=C270A66844234A94B55E&couponCode=25BBPMXFREETRMT',
            'foto' => 'sample.jpg',
            'embedded_video' => 'https://www.udemy.com/assets/61987553/files/2025-01-08_12-16-49-964f4fae7bce6eddf715fff2c864a4f5/2/aa000a2ac51c2cd4656f00268ab1129c61d3.m3u8?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYXRoIjoiMjAyNS0wMS0wOF8xMi0xNi00OS05NjRmNGZhZTdiY2U2ZWRkZjcxNWZmZjJjODY0YTRmNS8yLyIsImV4cCI6MTc0Mjg4OTQ3M30.nOC9dpwX47UlNBUBVcl7tJnEYwLc20Na1iraXg3XtFc&provider=cloudfront&v=1',
            'is_locked' => true,
            'total_price' => 99.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('courses')->insert([
            'instructor_id' => 2,
            'title' => 'Desain Fashion Untuk UMKM (Usaha Mikro, Kecil, dan Menengah)',
            'description' => 'This is a sample course description.',
            'price' => 99.99,
            'url' => 'https://www.udemy.com/course/desain-fashion-untuk-umkm-cocok-buat-pemula/?referralCode=70B7C797642BE8F07D87',
            'embedded_video' => 'https://www.udemy.com/assets/61790449/files/2024-12-31_10-30-42-ecb1e437ea231b19c2da309803333e06/2/aa005f37efaa02effd978e4171b6d8b4a1f0.m3u8?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYXRoIjoiMjAyNC0xMi0zMV8xMC0zMC00Mi1lY2IxZTQzN2VhMjMxYjE5YzJkYTMwOTgwMzMzM2UwNi8yLyIsImV4cCI6MTc0Mjg4ODkyOX0.Vwye66Exmj3IQlqOO4zSnwBPKzKu7S5DVXu7GTJGU0o&provider=cloudfront&v=1',
            'foto' => 'sample.jpg',
            'is_locked' => true,
            'total_price' => 99.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('courses')->insert([
            'instructor_id' => 3,
            'title' => 'Manajemen Perbedaan Generasi dalam Organisasi',
            'description' => 'This is a sample course description.',
            'price' => 99.99,
            'foto' => 'sample.jpg',
            'url' => 'https://www.udemy.com/course/manajemen-perbedaan-generasi-dalam-organisasi/?referralCode=B7E92ACAD99311B4B4DC',
            'embedded_video' => 'https://www.udemy.com/assets/62647757/files/2025-02-04_08-21-35-2293b59ebf26a237ffe13f6f4a358a41/2/aa0070e3473fba95e06477d59af6cb16bd0c.m3u8?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYXRoIjoiMjAyNS0wMi0wNF8wOC0yMS0zNS0yMjkzYjU5ZWJmMjZhMjM3ZmZlMTNmNmY0YTM1OGE0MS8yLyIsImV4cCI6MTc0Mjg4OTU0M30.1CeoCnsdAyvJMREf8-NN3QpaQeOmN6La55VhhcgS-0k&provider=cloudfront&v=1',
            'is_locked' => true,
            'total_price' => 99.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('courses')->insert([
            'instructor_id' => 4,
            'title' => 'Career Development & Branding',
            'description' => 'This is a sample course description.',
            'price' => 99.99,
            'url' => 'https://www.udemy.com/course/career-development-branding/?referralCode=912B90E90D07199E4FAF',
            'embedded_video' => 'https://www.udemy.com/assets/62885757/files/2025-02-13_11-05-52-1cb28af8e056abaf171f9ee6b934a10e/2/aa0037948534a35778859ee50aba71b2482e.m3u8?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYXRoIjoiMjAyNS0wMi0xM18xMS0wNS01Mi0xY2IyOGFmOGUwNTZhYmFmMTcxZjllZTZiOTM0YTEwZS8yLyIsImV4cCI6MTc0MjkwMDM0NH0.iSK2s7PxfQScF2xdFxE2KPiExMb6wBqcsjLd8szWZaY&provider=cloudfront&v=1',
            'foto' => 'sample.jpg',
            'is_locked' => true,
            'total_price' => 99.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('courses')->insert([
            'instructor_id' => 5,
            'title' => 'Bahasa Isyarat Pemula versi Umum',
            'description' => 'This is a sample course description.',
            'price' => 99.99,
            'url' => 'https://example.com',
            'embedded_video' => '-',
            'foto' => 'sample.jpg',
            'is_locked' => true,
            'total_price' => 99.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('courses')->insert([
            'instructor_id' => 5,
            'title' => 'Capcut untuk Usaha Mikro, Kecil dan Menengah (UMKM)',
            'description' => 'This is a sample course description.',
            'price' => 99.99,
            'url' => 'https://example.com',
            'embedded_video' => '-',
            'foto' => 'sample.jpg',
            'is_locked' => true,
            'total_price' => 99.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('courses')->insert([
            'instructor_id' => 5,
            'title' => 'Canva untuk UMKM',
            'description' => 'This is a sample course description.',
            'price' => 99.99,
            'url' => 'https://example.com',
            'embedded_video' => '-',
            'foto' => 'sample.jpg',
            'is_locked' => true,
            'total_price' => 99.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
