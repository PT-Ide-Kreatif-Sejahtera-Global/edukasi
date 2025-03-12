<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ([
            $user = new User,
            $user->name = "Admin",
            $user->email = "admin@gmail.com",
            $user->role = "Admin",
            $user->password = bcrypt('1'),
            // $user -> total_progress = '0',
            $user->foto = "default.jpg",
            // $user -> no_hp = '0895923847629',
            $user->save()
        ]);

        ([
            $user = new User(),
            $user->name = "Customer",
            $user->email = "customer@gmail.com",
            $user->role = 'Customer',
            $user->password = bcrypt('2'),
            // $user -> total_progress = '0',
            $user->foto = "default.jpg",
            // $user -> no_hp = '089611029347',
            $user->save(),
        ]);

        $instructors = [
            ['name' => 'Selgi Okta', 'email' => 'selgi.okta@gmail.com'],
            ['name' => 'Amazya Ravista', 'email' => 'amazya.ravista@gmail.com'],
            ['name' => 'Valiant Almer', 'email' => 'valiant.almer@gmail.com'],
            ['name' => 'Septilia Mahardika', 'email' => 'septilia.mahardika@gmail.com'],
            ['name' => 'Mahendra Teguh Priswanto', 'email' => 'mahendra.teguh1@gmail.com'],
            ['name' => 'Mahendra Teguh Priswanto', 'email' => 'mahendra.teguh2@gmail.com'],
            ['name' => 'Mahendra Teguh Priswanto', 'email' => 'mahendra.teguh3@gmail.com'],
        ];

        foreach ($instructors as $instructor) {
            $user = new User();
            $user->name = $instructor['name'];
            $user->email = $instructor['email'];
            $user->role = 'Instructor';
            $user->password = bcrypt('password');
            $user->foto = "default.jpg";
            $user->save();
        }
    }
}
