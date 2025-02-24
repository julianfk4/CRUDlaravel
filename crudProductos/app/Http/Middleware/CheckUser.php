<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Redirige al formulario de login si el usuario no está autenticado
            return redirect()->route('auth/login');
        }
        return $next($request);
    }
}
