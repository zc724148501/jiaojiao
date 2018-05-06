<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    protected $except = [
        '/user/*',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!empty($request->cookie('login')) && empty($request->session()->get('username'))){
            $request->session()->put('username',$request->cookie('login'));
        }
        elseif (empty($request->session()->get('username')) && $request->path() != 'user/login'){
            return redirect('user/login');
        }
        if ($request->path() == 'user/login' || $request->path() == 'user/register' || $request->path() == '/'){
            return redirect('user/homepage');
        }
        return $next($request);
    }
}
