<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder {

    public function run(): void {
        
        User::create([
            'id' => Str::uuid(),
            'name' => 'Matheus Prestes',
            'email' => 'matheus@example.com',
            'password' => Hash::make('senha123'),
        ]);

        User::create([
            'id' => Str::uuid(),
            'name' => 'João Silva',
            'email' => 'joao@example.com',
            'password' => Hash::make('senha456'),
        ]);
    }
}
