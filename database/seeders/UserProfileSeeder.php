<?php

namespace Database\Seeders;

use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserProfile::create([
            'user_id' => 1,
            'nama_depan' => 'admin',
            'nama_belakang' => 'admin',
            'alamat' => 'admin system',
            'no_handphone' => '1234567890'
        ]);

        UserProfile::create([
            'user_id' => 2,
            'nama_depan' => 'Badrus',
            'nama_belakang' => 'Sabidil',
            'alamat' => 'Palengaan Laok',
            'no_handphone' => '1234567890'
        ]);

        UserProfile::create([
            'user_id' => 3,
            'nama_depan' => 'Idris',
            'nama_belakang' => 'Amrozi',
            'alamat' => 'Palengaan Dajah',
            'no_handphone' => '1234567890'
        ]);
    }
}
