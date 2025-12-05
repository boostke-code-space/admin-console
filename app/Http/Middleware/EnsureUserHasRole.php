<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    public function handle($request, Closure $next, string $role)
    {
        if (! Auth::check() || ! Auth::user()->hasRole($role)) {
            return abort(404, 'Page not found');
        }

        return $next($request);
    }
}
