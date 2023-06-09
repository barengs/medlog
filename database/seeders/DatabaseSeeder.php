<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\HasilDiagnosa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserRolePermissionSeeder::class,
            UserProfileSeeder::class,
            ObatSeeder::class,
            PasienSeeder::class,
            KategoriObatSeeder::class,
            PositionSeeder::class,
            CheckupSeeder::class,
            KeluhanPasienSeeder::class,
            HasilDiagnosaSeeder::class,
        ]);
    }
}
