<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Config;
class BackendLoginAuthenticate
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
        
        if (Auth::check()){
            if(Auth::user()->role_id == Config::get('constants.ROLES.Admin')){
                return redirect('/admin/dashboard');
            }
        }
        
        return $next($request);
    }

}
