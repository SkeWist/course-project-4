<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Создаём пользователей через Eloquent
        $users = [
            [
                'name' => 'Admin',
                'surname' => 'User',
                'login' => 'admin',
                'password' => Hash::make('password123'), // Хешируем пароль
                'role_id' => 1, // Роль администратора
            ],
            [
                'name' => 'Regular',
                'surname' => 'User',
                'login' => 'user',
                'password' => Hash::make('password123'), // Хешируем пароль
                'role_id' => 2, // Роль обычного пользователя
            ],
        ];

        foreach ($users as $userData) {
            // Создаём пользователя
            $user = User::create($userData);

            // Генерируем Sanctum-токен
            $token = $user->createToken('auth_token')->plainTextToken;

            // Сохраняем токен в api_token
            $user->api_token = $token;
            $user->save();
        }
    }
}
