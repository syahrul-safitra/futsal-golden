<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\Galery::create([
            'gambar1' => 'jpg',
            'gambar2' => 'jpg',
            'gambar3' => 'jpg',
            'gambar4' => 'jpg',
            'gambar5' => 'jpg',
            'gambar6' => 'jpg',
            'gambar7' => 'jpg',
            'gambar8' => 'jpg',
            'gambar9' => 'jpg',
            'gambar10' => 'jpg',
            'gambar11' => 'jpg',
            'gambar12' => 'jpg',
            'gambar13' => 'jpg',
            'gambar14' => 'jpg',
            'gambar15' => 'jpg',
        ]);
    }
}
