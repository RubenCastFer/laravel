<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * ClienteAuthMiddleware
 * @author Rubén Castellano Fernández
 * @version 1.0
 * @since 08-04-2022
 */
class ClienteAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $tipo = $request->session()->get('tipo');
        if ($tipo!='cliente') {
            return redirect()->route('cliente.login');
        }
        return $next($request);
    }
}
