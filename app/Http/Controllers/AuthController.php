<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Регистрация нового пользователя
    public function register(Request $request)
    {
        // Валидация входных данных
        $validator = Validator::make($request->all(), [
            'login' => 'required|string|min:6|max:32|unique:users',
            'password' => 'required|string|min:6|max:32|confirmed',
            'name' => 'required|string|min:3|max:50',
            'surname' => 'required|string|min:3|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Создание нового пользователя
        $user = User::create([
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'surname' => $request->surname,
            'role_id' => 2
        ]);

        // Генерация токена
        $token = $user->createToken(Str::random(10))->plainTextToken;

        // Сохраняем токен в api_token
        $user->api_token = $token;
        $user->save();

        return response()->json([
            'message' => 'User successfully registered',
            'data' => [
                'login' => $user->login,
                'name' => $user->name,
                'surname' => $user->surname,
                'role_id' => $user->role_id,
                'updated_at' => $user->updated_at,
                'created_at' => $user->created_at,
                'id' => $user->id,
            ],
            'token' => $token
        ], 201);
    }



    // Авторизация пользователя
    public function login(Request $request)
    {
        // Валидация входных данных
        $validator = Validator::make($request->all(), [
            'login' => 'required|string',
            'password' => 'required|string|min:6|max:32',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Проверяем, существует ли пользователь
        $user = User::where('login', $request->login)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Проверяем, есть ли у пользователя уже существующий токен в базе
        $existingToken = $user->api_token;

        if (!$existingToken) {
            // Создаем новый токен и вручную сохраняем в базе
            $token = $user->createToken('auth_token')->plainTextToken;

            // Сохраняем токен в поле api_token таблицы users
            $user->api_token = $token;
            $user->save();
        } else {
            // Используем уже сохраненный токен
            $token = $existingToken;
        }

        return response()->json([
            'message' => 'Login successful',
            'data' => [
                'login' => $user->login,
                'name' => $user->name,
                'surname' => $user->surname,
                'role_id' => $user->role_id,
                'updated_at' => $user->updated_at,
                'created_at' => $user->created_at,
                'id' => $user->id,
            ],
            'token' => $token
        ], 200);
    }

    // Логаут пользователя
    public function logout(Request $request)
    {
        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(['message' => 'Successfully logged out']);
    }
}
