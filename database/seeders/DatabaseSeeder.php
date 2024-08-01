<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Reyniota Azriel',
            'email' => 'admin@gmail.com',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Kobo Kanaeru',
            'email' => 'kobo@gmail.com',
            'password' => '123456',
        ]);

        Penduduk::create([
            'name' => 'Kobo Kanaeru',
            'gender' => 'P',
            'place_of_birth' => 'Ngawi',
            'date_of_birth' => '2004-04-01',
            'address' => 'Ngawi Utara',
            'photo' => '',
        ]);
    }
}
