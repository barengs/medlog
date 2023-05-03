<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pasien::create([
            'no_pasien' => 'P001052023',
            'nama_depan' => 'Muhammad',
            'nama_belakang' => 'Ali',
            'jenis_kelamin' => 'pria',
            'no_ktp' => '3528061508860001',
            'alamat' => 'Jl. Raya Palengaan',
        ]);
    }
}
