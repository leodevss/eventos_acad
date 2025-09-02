<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ifc.edu.br'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('senha123'),
                'is_admin' => true,
            ]
        );
    }
}
