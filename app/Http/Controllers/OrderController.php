<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Image;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderDetail;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {//已登入
            if (Auth::user()->ismember == '0') {
                $orders = Order::all();
//            $email= User::where('id',$orders->user_id)->get();
//                $usersa = DB::table('users')->select('id', 'email as user_email')->get();
                $users = User::
                    join('orders', 'users.id', '=', 'orders.user_id')
                    ->select('users.email')
                    ->get();
                $data = [
                    'order_date' => $orders,
                    'users'=>$users
//                    'users' => Auth::user()->email
//                    現在這個是抓我登入的信箱
                ];
                return view('orders.index', $data);
            }else if(Auth::user()->ismember == '1') {
                $users = User::find(Auth::user()->id);
                $orders = Order::where('user_id',Auth::user()->id)->get();
                $account = User::find(22)->account;
                //抓不到    $orders = $users->order()->get();
                $data = [
                    'order' => $orders,
                    'users'=>$users,
                    'account'=>$account
//                    'users' => Auth::user()->email
//                    現在這個是抓我登入的信箱
                ];
                return view('orders.index1', $data);
            }
        }else{
            return redirect()->route('home.index')->with('alert', '請登入!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($room_id)
    {
        if(Auth::check()) {//已登入
            if (Auth::user()->ismember == '1') {
                $rooms = Room::find($room_id);
                $orders = Order::where('room_id', $room_id)->get();
                $images = Image::where('room_id', $room_id)->get();
                $account = User::find(22)->account;
                if(isset($images)){
                    $data = [
                        'images'=>$images,
                        'rooms'=>$rooms,
                        'order'=>$orders,
                        'images'=>$images,
                        'account'=>$account
                    ];
                }else{
                    $data = [
                        'rooms'=>$rooms,
                        'order'=>$orders,
                        'images'=>$images,
                        'account'=>$account
                    ];
                }

                return view('orders.create', $data);
            }else if(Auth::user()->ismember == '0') {
                return redirect('/');
            }
        }else{
            return redirect()->route('home.index')->with('alert', '請登入!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //需考慮 OrderDetailController.php
        /*Order::create($request->all());
        return redirect()->route('orders.index');*/
        /*方案1
        and (
            (start_date >= $request->start_date and start_date <= $request->end_date)
            or
            (end_date >= $request->start_date and end_date <= $request->end_date)
        )
        方案2
        and (
            (Between start_date $request->start_date and $request->end_date)
            or
            (Between end_date $request->start_date and $request->end_date)
            or
            (start_date <= $request->start_date and end_date >= $request->end_date)
        )*/
        $check = Order::where('room_id',$request->room_id)
            ->where(function ($query) use ($request){
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orwhereBetween('end_date', [$request->start_date, $request->end_date])
                    ->orwhereRaw('start_date <= '.$request->start_date.' and end_date >= '.$request->end_date);
            })->get();
        if(count($check) > 0){
            return redirect()->route('home.index')->with('alert', '已被訂購!');
        }else{
            $rooms = Room::find($request->room_id);
            $od = Order::create([
                'room_id'=>$request->room_id,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'user_id'=>Auth::user()->id,
                'status'=>'未處理'
            ]);
        }
        return redirect()->route('orders.index')->with('alert', '訂購成功!');
//
//        OrderDetail::create([
//            'order_id'=>$request->start_date,
//            'end_date'=>$request->end_date,
//            'user_id'=>Auth::user()->id,
//        ]);
//        $rooms = Room::orderBy('created_at', 'DESC')->get();
//        if($request->has('image')) {
//            OrderDetail::create([
//                'order_id'=>$rooms->id,
//                'room_id'=>$room,
//            ]);
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        /*$data = [
            'order'=>$order,
        ];
        return view('orders.edit', $data);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update(['status'=>$request->status]);
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
