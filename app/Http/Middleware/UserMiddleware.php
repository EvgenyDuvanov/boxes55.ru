<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Предполагается, что у пользователя есть поле 'is_admin' в таблице пользователей
        if (Auth::check() && !Auth::user()->is_admin) {
            return $next($request);
        }

        // Если пользователь администратор, перенаправляем его на главную страницу или выдаем 403 ошибку
        return redirect('/');
    }
}

