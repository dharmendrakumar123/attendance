<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class SuperadminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
         if( Auth::check() )
        {
			// if user is not admin take him to his dashboard
            if ( Auth::user()->isUser()) {
                 return redirect(route('employee_dashboard'));
            }
			else if ( Auth::user()->isAdmin() ) {
                 return $next($request);
            }
        }
		abort(404); 
		//return $next($request);
    }
}
