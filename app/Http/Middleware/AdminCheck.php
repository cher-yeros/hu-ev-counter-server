<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
       if(!Auth::user()) {
            return redirect('/login');
       }
       
        $slug = Auth::user()->campus->slug;
        $slug = "hawassa-university";
       
       if($request->is($slug) || $request->is($slug.'/*')) {
        //    dd('pass : '.$slug);
       }
       else {
           return redirect('/'.$slug);
            // dd('redirect! : '.$slug);
       }

       $role = Auth::user()->role->pluck('name');
       
       if(!$role->contains('campus-admin')) {
           if($role->contains('super-admin')) {
            return redirect('/evange-control');
           }
           return redirect('/login');
       }
        return $next($request);
    }
}
