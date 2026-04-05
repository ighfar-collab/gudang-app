<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cache permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat role jika belum ada
        $roles = ['admin', 'mitra', 'driver'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // =====================
        // ADMIN
        // =====================
        $admin = User::firstOrCreate(
            ['email' => 'admin@mail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('00000000'),
            ]
        );
        $admin->syncRoles(['admin']);

        // =====================
        // MITRA
        // =====================
        $mitra = User::firstOrCreate(
            ['email' => 'mitra@mail.com'],
            [
                'name' => 'Mitra',
                'password' => Hash::make('00000000'),
            ]
        );
        $mitra->syncRoles(['mitra']);

        // =====================
        // DRIVER
        // =====================
        $driver = User::firstOrCreate(
            ['email' => 'driver@mail.com'],
            [
                'name' => 'Driver',
                'password' => Hash::make('00000000'),
            ]
        );
        $driver->syncRoles(['driver']);
    }
}

