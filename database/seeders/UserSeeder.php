<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'surname' => 'User',
                'login' => 'admin',
                'password' => Hash::make('password123'), // Зашифрованный пароль
                'role_id' => 1, // Роль администратора
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular',
                'surname' => 'User',
                'login' => 'user',
                'password' => Hash::make('password123'), // Зашифрованный пароль
                'role_id' => 2, // Роль обычного пользователя
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as &$user) {
            $user['api_token'] = Str::random(60); // Генерация токена для каждого пользователя
        }

        DB::table('users')->insert($users);
    }
}
