<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RolesAndUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles si no existen
        $roles = ['admin', 'secre', 'bodega', 'cajera'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Crear usuarios y asignar roles
        $usersData = [
            [
                'name' => 'Admin User',
                'email' => 'admin@espe.edu.ec',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ],
            [
                'name' => 'Secretaria User',
                'email' => 'secre@espe.edu.ec',
                'password' => Hash::make('password'),
                'role' => 'secre'
            ],
            [
                'name' => 'Bodega User',
                'email' => 'bodega@espe.edu.ec',
                'password' => Hash::make('password'),
                'role' => 'bodega'
            ],
            [
                'name' => 'Cajera User',
                'email' => 'cajera@espe.edu.ec',
                'password' => Hash::make('password'),
                'role' => 'cajera'
            ],
        ];

        foreach ($usersData as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => $userData['password']
                ]
            );
            $user->assignRole($userData['role']);
        }
    }
}
