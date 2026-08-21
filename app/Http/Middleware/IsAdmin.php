<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user belum login, atau role-nya bukan admin, tendang kembali ke homepage!
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/');
        }

        return $next($request); // Jika dia admin, persilakan lewat
    }
}