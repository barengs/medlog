<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'barick',
            'email' => 'barick@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Pasien::create([
            'user_id' => $user->id,
            'no_pasien' => 'P001042023',
            'nama_depan' => 'Muhammad',
            'nama_belakang' => 'Barick',
            'jenis_kelamin' => 'pria',
            'no_ktp' => '3528061508860001',
            'alamat' => 'Jl. Raya Palengaan',
        ]);

        $user->assignRole('user');

        $user2 = User::create([
            'name' => 'badrus',
            'email' => 'badrus@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Pasien::create([
            'user_id' => $user2->id,
            'no_pasien' => 'P002052023',
            'nama_depan' => 'Badrus',
            'nama_belakang' => 'Sabidil',
            'jenis_kelamin' => 'pria',
            'no_ktp' => '3528061508860002',
            'alamat' => 'Jl. Raya Palengaan',
        ]);

        $user2->assignRole('user');
    }
}
