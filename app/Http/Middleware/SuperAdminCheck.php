<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class SuperAdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()) {
            return redirect('/login');
       }

       $role = Auth::user()->role->pluck('name');
       
       if(!$role->contains('super-admin')) {
           if($role->contains('campus-admin')) {
            return redirect('/');
           }
           return redirect('/login');
       }
        return $next($request);
    }
}
