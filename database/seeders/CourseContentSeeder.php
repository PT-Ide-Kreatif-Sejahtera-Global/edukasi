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
                'title' => 'Belajar Parenting dan Komunikasi dengan Anak Sesuai Usia',
                'url' => 'https://www.udemy.com/course/belajar-parenting-dan-komunikasi-dengan-anak-sesuai-usia/?referralCode=C270A66844234A94B55E&couponCode=25BBPMXFREETRMT',
                'duration' => 1.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'course_category_id' => 1,
                'section_id' => 2,
                'title' => 'Desain Fashion Untuk UMKM (Usaha Mikro, Kecil, dan Menengah)',
                'url' => 'https://www.udemy.com/course/desain-fashion-untuk-umkm-cocok-buat-pemula/?referralCode=70B7C797642BE8F07D87',
                'duration' => 2.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'course_category_id' => 1,
                'section_id' => 3,
                'title' => 'Manajemen Perbedaan Generasi dalam Organisasi',
                'url' => 'https://www.udemy.com/course/manajemen-perbedaan-generasi-dalam-organisasi/?referralCode=B7E92ACAD99311B4B4DC',
                'duration' => 2.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'course_category_id' => 1,
                'section_id' => 4,
                'title' => 'Career Development & Branding',
                'url' => 'https://www.udemy.com/course/career-development-branding/?referralCode=912B90E90D07199E4FAF',
                'duration' => 1.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'course_category_id' => 1,
                'section_id' => 5,
                'title' => 'Bahasa Isyarat Pemula versi Umum',
                'url' => '#',
                'duration' => 1.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'course_category_id' => 1,
                'section_id' => 6,
                'title' => 'Capcut untuk Usaha Mikro, Kecil dan Menengah (UMKM)',
                'url' => '#',
                'duration' => 1.4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'course_category_id' => 1,
                'section_id' => 7,
                'title' => 'Canva untuk UMKM',
                'url' => '#',
                'duration' => 1.6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
