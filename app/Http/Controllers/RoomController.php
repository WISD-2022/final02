<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Requests\SearchRoomRequest;
use Hamcrest\InvokedMatcherTest;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->ismember == '0'){
//            $rooms = Room::all();
//            $data = ['rooms' => $rooms];
            $rooms = Room::orderBy('created_at', 'DESC')->get();
            $data = [
                'id' => $rooms->id
            ];
            return view('rooms.index', $data);//, $data);
        }else if(Auth::user()->ismember == '1'){
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
//        $this->validate($request, [
//            'image' => 'required|image',
//        ]);
    //        Validator::make($request->all(), [
    //            'image' => 'required|image',
    //        ])->validate();
        Room::create([
            'id'=>$request->id,
            'introduce'=>$request->introduce,
            'shelf_status'=>$request->shelf_status,
            'people'=>$request->people,
            'amount'=>$request->amount,
        ]);
        if($request->has('image')) {
            //影像圖檔-自訂檔案名稱
            $imageName = $request->id.'_'.time().'.'.$request->image->extension();
            //把檔案存到公開的資料夾
            $file_path = $request->image->move(public_path('images'), $imageName);
            Image::create([
                'id'=>'201',
                'image'=>$file_path,
                'room_id'=>$request->id,
            ]);
        }


//        $room = image()->attach($image->id,['id'=>$id]);

//        Room::create($request->all());

//        $room->setting()->create();
//        $room = new Room;
//        $room->id = $request->id;
//        $room->save();
        return redirect()->route('rooms.index')->with('alert', '新增房間成功!');
//        return redirect('rooms');
    }


    public function search(SearchRoomRequest $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        /*$data = [
            'room'=>$room,
        ];
        return view('rooms.edit', $data);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        /*$room->update($request->all());
        return redirect()->route('rooms.index');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }
}
