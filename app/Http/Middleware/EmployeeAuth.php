<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class EmployeeAuth
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
            
			//dd(Auth::user()->isAdmin());
			// if user admin take him to his dashboard
            if ( Auth::user()->isAdmin() ) {
                 return redirect(route('home'));
            }
            // allow user to proceed with request
            else if ( Auth::user()->isUser()) {
                 return $next($request);
            }
        }
        abort(404);  // for other user throw 404 error
		//return $next($request);
    }
}
