<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectWithoutPermission
{
    public function handle(Request $request, Closure $next, $permission)
    {
        if (!Auth::user()->can($permission)) {
            // return redirect()->route('admin.dashboard');
            $userHaveAnyPermission = auth()->user()->roles->isNotEmpty() ? 1 : 0;
            if ($userHaveAnyPermission) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}