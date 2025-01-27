<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpFoundation\Response;

class UserAccessDashboardMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario no es admin y no está en el dashboard
        if (!Auth::user()->isAdmin() && !$request->is('dashboard')) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}