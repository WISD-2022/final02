<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){//已登入
            /*if(Auth::user()->ismember == '0'){
                return redirect('/rooms');
            }else if(Auth::user()->ismember == '1'){
                return redirect('/');
            }*/
            return view('home.index');
        }else{
            return redirect('/login');
        }
    }
}
