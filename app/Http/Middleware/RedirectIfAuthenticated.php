<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            //登入頁面跳轉驗證身分
            if (!Auth::guard($guard)->guest()) {
                if(Auth::guard($guard)->user()->ismember == '0'){
                    return redirect('/rooms');
                }else if(Auth::guard($guard)->user()->ismember == '1'){
                    return redirect('/');
                }
            }
        }
        return $next($request);
    }
}
