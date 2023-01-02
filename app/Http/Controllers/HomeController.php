<?php

namespace App\Http\Controllers;

use App\Models\Room;
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
            $rooms = Room::all();
            $data = [
                'rooms' => $rooms
            ];
            return view('home.index', $data);
        }else{
            return redirect('/login');
        }

    }
}
