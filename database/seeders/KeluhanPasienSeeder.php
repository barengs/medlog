<?php

namespace Database\Seeders;

use App\Models\KeluhanPasien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeluhanPasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KeluhanPasien::create([
            'checkup_id' => 1,
            'keluhan' => 'sakit kepala',
            'lama_keluhan' => 2,
            'satuan' => 'hari'
        ]);
        KeluhanPasien::create([
            'checkup_id' => 1,
            'keluhan' => 'panas tinggi',
            'lama_keluhan' => 2,
            'satuan' => 'hari'
        ]);
    }
}
