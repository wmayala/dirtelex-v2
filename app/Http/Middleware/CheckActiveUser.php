<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     *
     * Valida que el usuario que intenta iniciar sesión está activo en el sistema, sino se encuentra activo muestra un mensaje.
     * Este middleware se agrega en el grupo de rutas en web.php
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->status==0)
        {
            Auth::logout();
            return redirect()->route('login')->with('warning','El usuario se encuentra inactivo, comuníquese con el administrador');
        }
        return $next($request);
    }
}
