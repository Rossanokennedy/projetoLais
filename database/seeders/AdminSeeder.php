<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate([
            'name'              => 'Administrador',
            'email'             => 'admin@admin.com',
            'password'          => Hash::make('password'),
            'cpf'         => 'admin',
            'state'           => 'admin',
            'tel'          => '99999999',
            'role' => 'admin'
        ]);

        $admin->save();
    }
}
