<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class hasPermissionSeg4
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accessName = ['show','add','edit','delete'];
        $permissionData = Session('roleaccess_session');
        
        $slug = getSlugUrl(3);
        $access = request()->segment(4) ? request()->segment(4) : 'show';
        $access = in_array($access, $accessName) ? $access : 'edit';

        $slugAccess = $slug.' '.$access;
        $permissionCheck = in_array($slugAccess, $permissionData);

        if (!$permissionCheck) {
            return redirect()->intended('dashboard')->with('forbidden', 'Anda tidak memiliki akses');
        }

        return $next($request);
    }
}
