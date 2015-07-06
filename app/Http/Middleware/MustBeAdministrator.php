<?php namespace App\Http\Middleware;

use Closure;

class MustBeAdministrator {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next){ 	
		//If user is logged in and is an admin//
		//$user = $request->user();

		if (auth()->$user && auth()->$user->role == 'admin') { 

			return $next($request);
			}

		return redirect('/rental.index');
	}  
	

}
