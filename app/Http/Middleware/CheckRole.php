<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Получаем текущего пользователя и загружаем его роль
        $user = auth()->user()->load('role'); // Загрузка роли

        // Если пользователь не аутентифицирован или роль не совпадает с role_id = 1
        if (!$user || $user->role->id !== 1) {  // Используем role->id для проверки
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}
