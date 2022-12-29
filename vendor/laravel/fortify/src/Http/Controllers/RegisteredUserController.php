<?php

namespace Laravel\Fortify\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;

class RegisteredUserController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Show the registration view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\RegisterViewResponse
     */
    public function create(Request $request): RegisterViewResponse
    {
        return app(RegisterViewResponse::class);
    }

    /**
     * Create a new registered user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\CreatesNewUsers  $creator
     * @return \Laravel\Fortify\Contracts\RegisterResponse
     */
    public function store(Request $request,
                          CreatesNewUsers $creator, ...$guards)//: RegisterResponse
    {
        event(new Registered($user = $creator->create($request->all())));
        $guards = empty($guards) ? [null] : $guards;

        $this->guard->login($user);
        foreach ($guards as $guard) {
            //註冊頁面跳轉驗證身分
            if (!Auth::guard($guard)->guest()) {
                if(Auth::guard($guard)->user()->ismember == '0'){
                    return redirect('/rooms');
                }else if(Auth::guard($guard)->user()->ismember == '1'){
                    return redirect('/');
                }
            }
        }
        //return app(RegisterResponse::class);
    }
}
