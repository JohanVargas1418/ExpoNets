<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next, ...$roles): Response
    {
        //Verificamos si el usuario esta autenticado
        if (!$request->user()) {
            return response()->json(['error' => 'No autorizado'], 401);
        }

        //Obtenemos el rol del usuario
        $userRole = $request->user()->role;

        //Verificamos si el rol del usuario esta en la lista de roles permitidos
        if (!in_array($userRole, $roles)) {
            return response()->json(['error' => 'No tienes permiso para acceder a este recurso'], 403);
        }

        //Si todo esta bien, continuamos con la peticion
        return $next($request);
    }
}
