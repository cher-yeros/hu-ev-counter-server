<?php

namespace App\Http\Middleware;

use Closure;

class RoleCheck
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
       
       if(!$role->contains('admin')) {
           return redirect('/threads')->with('flash', 'No Permission');
       }
        return $next($request);
    }
}
