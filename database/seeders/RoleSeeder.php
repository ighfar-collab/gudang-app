<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $driver = Role::create(['name' => 'driver']);

        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
        ]);
        $adminUser->assignRole('admin');

        $driverUser = User::create([
            'name' => 'Driver',
            'email' => 'driver@mail.com',
            'password' => Hash::make('password'),
        ]);
        $driverUser->assignRole('driver');
    }
}


