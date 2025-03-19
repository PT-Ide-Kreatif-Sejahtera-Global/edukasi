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
            'url' => 'https://www.udemy.com/course/manajemen-perbedaan-generasi-dalam-organisasi/?referralCode=B7E92ACAD99311B4B4DC',
            'foto' => 'sample.jpg',
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
            'foto' => 'sample.jpg',
            'is_locked' => true,
            'total_price' => 99.99,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
