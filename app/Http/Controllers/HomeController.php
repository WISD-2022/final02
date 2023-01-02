<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $data = [
            'rooms' => $rooms
        ];
        if(Auth::check()){//已登入
            /*if(Auth::user()->ismember == '0'){
                return redirect('/rooms');
            }else if(Auth::user()->ismember == '1'){
                return redirect('/');
            }*/

            return view('home.index', $data);
        }else{
//            return redirect('/login');
            return view('home.index', $data);
        }

    }
}
