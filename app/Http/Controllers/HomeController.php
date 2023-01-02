<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::where('shelf_status','1')->get();

        $data = [
            'rooms' => $rooms,
        ];
        if(Auth::check()){//已登入
            /*if(Auth::user()->ismember == '0'){
                return redirect('/rooms');
            }else if(Auth::user()->ismember == '1'){
                return redirect('/');
            }*/
            if(Auth::user()->ismember==1){
                $ismember = Auth::user()->ismember;
                $data = [
                    'rooms' => $rooms,
                    'ismember'=>$ismember
                ];
            }
            return view('home.index', $data);
        }else{
//            return redirect('/login');
            return view('home.index', $data);
        }

    }
}
