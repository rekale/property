<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {

        if(! in_array($request->user()->level, $roles) )
        {
            flash('why you want to go there? you don\'t have access.', 'danger');

            return redirect()->back();
        }

        return $next($request);
    }
}
