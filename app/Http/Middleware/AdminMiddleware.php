<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        $user = session()->all();
        if(!$user['user_login'])             //限制年龄小18岁的不能访问
        return redirect()->route('admin');
        return $next($request);
    }
}
