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
    }
}
