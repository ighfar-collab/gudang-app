<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Buat role Super Admin jika belum ada
        $role = Role::firstOrCreate(['name' => 'super-admin']);

        // Buat user Super Admin
        $user = User::firstOrCreate(
            ['email' => 'superadmin@mail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
            ]
        );

        // Assign role
        $user->assignRole($role);
    }
}
