<?php

namespace App\Http\Middleware;


use Closure;

class isNotAnAdminMiddleware
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
//        if (! $request->user()->Admin())
//        {   return redirect('/admin');
//        }else return redirect('/home');
//
//        return $next($request);
    }
}
