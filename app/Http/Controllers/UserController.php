<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json([
            'message' => 'Список всех пользователей',
            'users' => $users,
        ]);
    }
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed', // Новый пароль и подтверждение обязательны
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Ошибка валидации.', 'errors' => $validator->errors()], 422);
        }

        $user = Auth::user();

        $user->password = Hash::make($request->password); // Хешируем новый пароль

        $user->save();

        return response()->json(['message' => 'Пароль успешно обновлён.'], 200);
    }
}
