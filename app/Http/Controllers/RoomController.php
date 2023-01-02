<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Requests\SearchRoomRequest;
use Hamcrest\InvokedMatcherTest;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\RoomRepository;


class RoomController extends Controller
{
    protected $roomRepo;

    public function __construct(RoomRepository $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {//已登入
            if (Auth::user()->ismember == '0') {
//            $rooms = Room::all();
//            $data = ['rooms' => $rooms];
//            $rooms = Room::all();
//            $this->room = new Room(); //initializes it
//            return view('rooms.index', compact('rooms'));
                $rooms = $this->roomRepo->index();
                $data = [
                    'rooms' => $rooms
                ];
                return view('rooms.index', $data);//, $data);
            } else if (Auth::user()->ismember == '1') {
                return redirect('/');
            }
        }
        else{
            return redirect()->route('home.index')->with('alert', '請登入!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()) {//已登入
            if (Auth::user()->ismember == '0') {
                $account = Auth::user()->account;
                return view('rooms.create', compact('account'));
            }else if(Auth::user()->ismember == '1') {
                return redirect('/');
            }
        }else{
            return redirect()->route('home.index')->with('alert', '請登入!');
        }
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
                'image'=>$imageName,
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

//    public function search(SearchRoomRequest $request)
//    {
//        return view('rooms.create');
//    }

    public function search(SearchRoomRequest $request)
    {

        $name = $request->get('search1');
        //when 参数一有则执行匿名函数
        $data =  Room::when($name,function ($query)use ($name){
            $query->where('id','like',"%{$name}%");
        })->get();
       // dd($data);
        return view('rooms.search',compact('data','name'));
//        return view('rooms.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $images = Image::where('room_id', $room->id)->get();
        if(isset($images)){
            $data = [
                'images'=>$images,
                'rooms' => $room

            ];
        }else{
            $data = [
                'rooms' => $room
            ];
        }

        return view('rooms.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        if(Auth::check()) {//已登入
            if (Auth::user()->ismember == '0') {
                $account = Auth::user()->account;
                $images = Image::where('room_id', $room->id)->get();
                if(isset($images)){
                    $data = [
                        'room'=>$room,
                        'images'=>$images,
                        'account'=>$account
                    ];
                }else{
                    $data = [
                        'room'=>$room,
                        'account'=>$account
                    ];
                }
                return view('rooms.edit', $data);
            }else if(Auth::user()->ismember == '1') {
                return redirect('/');
            }
        }else{
            return redirect()->route('home.index')->with('alert', '請登入!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Room $room, UpdateRoomRequest $request)
    {
        if($request->has('image')) {
            //影像圖檔-自訂檔案名稱
            $imageName = $room->id.'_'.time().'.'.$request->image->extension();
            //把檔案存到公開的資料夾
            $file_path = $request->image->move(public_path('images'), $imageName);
            Image::where('room_id',$room->id)->update(['image'=>$imageName]);
        }
        $data = $request->all();
        unset($data['image']);
        $room->update($data);

//        Room::whereId($room)->update($validatedData);
        return redirect()->route('rooms.index')->with('alert', '更新房間成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        Image::where('room_id',$room->id)->delete();
        $room->delete();
        return redirect()->route('rooms.index')->with('alert', '刪除房間成功!');
    }
}
