<?php

namespace Database\Seeders;

use App\Models\KategoriObat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriObat::create([
            'nama' => 'Obat Panas'
        ]);
    }
}
