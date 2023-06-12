<?php

namespace Database\Seeders;

use App\Models\Checkup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Checkup::create([
            'antrian' => '001',
            'user_id' => 1,
            'pasien_id' => 1,
            'status' => 'open',
        ]);
    }
}
