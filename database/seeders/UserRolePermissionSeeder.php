<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buat user baru
        $default = [
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];

        $admin = User::create(array_merge([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ], $default));

        $dokter = User::create(array_merge([
            'name' => 'dokter',
            'email' => 'dokter@gmail.com',
        ], $default));

        $staff = User::create(array_merge([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
        ], $default));

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleDokter = Role::create(['name' => 'dokter']);
        $roleStaff = Role::create(['name' => 'staff']);
        $roleUser = Role::create(['name' => 'user']);

        $permission = Permission::create(['name' => 'read kategori obat']);
        $permission = Permission::create(['name' => 'create kategori obat']);
        $permission = Permission::create(['name' => 'update kategori obat']);
        $permission = Permission::create(['name' => 'delete kategori obat']);

        $permission = Permission::create(['name' => 'read obat']);
        $permission = Permission::create(['name' => 'create obat']);
        $permission = Permission::create(['name' => 'update obat']);
        $permission = Permission::create(['name' => 'delete obat']);

        $permission = Permission::create(['name' => 'read pasien']);
        $permission = Permission::create(['name' => 'create pasien']);
        $permission = Permission::create(['name' => 'update pasien']);
        $permission = Permission::create(['name' => 'delete pasien']);

        $admin->assignRole('admin');
        $dokter->assignRole('dokter');
        $staff->assignRole('staff');

        $roleAdmin->givePermissionTo('read kategori obat');
        $roleAdmin->givePermissionTo('create kategori obat');
        $roleAdmin->givePermissionTo('update kategori obat');
        $roleAdmin->givePermissionTo('delete kategori obat');

        $roleAdmin->givePermissionTo('read obat');
        $roleAdmin->givePermissionTo('create obat');
        $roleAdmin->givePermissionTo('update obat');
        $roleAdmin->givePermissionTo('delete obat');

        // DB::beginTransaction();
        
        // try {
        //     # code...

        //     DB::commit();
        // } catch (\Throwable $e) {
        //     # code...
        //     DB::rollBack();
        // }

    }
}
