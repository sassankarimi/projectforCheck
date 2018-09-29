<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdministrator
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
        $user=$request->user();

        if($user && $user->email=='sassan.mc@gmail.com')
        {
            return $next($request);
        }
        abort('404','end of the life');


    }
}
