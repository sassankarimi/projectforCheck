<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class MustBeConfirm
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
        dd($request->user());
        $user=User::where('verified','=','1')->exists();
//dd($user);
        if(!$user)
        {
            flash('Confirm','please confirm your account','danger','flash_message');
            return redirect('/login');
        }
        return $next($request);


    }
}
