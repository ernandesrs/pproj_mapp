<?php

namespace App\Http\Middleware;

use App\Enums\Admin\Permissions\UserPermissionsEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()->hasPermissionTo(UserPermissionsEnum::ADMIN_ACCESS->value)) {
            abort(401);
        }

        return $next($request);
    }
}
