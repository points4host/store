<?php

namespace App\Http\Middleware;

use App\Http\Controllers\PermissionController;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminControlPanelMiddleware
{
    /**
     * صلاحيات دخول لوحة التحكم
     */
    public function handle($request, Closure $next)
    {
        
        if (Auth::check() == 0 ) {
            return redirect('home');
        }
        $role_permission = PermissionController::check_permission(['administrator','admin']);
        if ($role_permission == true) {
            return $next($request);
        }
        return redirect('home');
    }

/*
    public function handle($request, Closure $next)
    {
        
        if (Auth::check() == 0 ) {
            return redirect('home');
        }

        // $role_permission = PermissionController::check_permission(['administrator','admin']);
        // if ($role_permission > 0) {
        //     return $next($request);
        // }

        if(auth()->user()->hasRoles(['administrator','admin'])) {
            return $next($request);
        }
        return redirect('home');
    }
*/

}
