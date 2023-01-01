<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderDetail;
use App\Models\Room;
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
        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Room $room, StoreOrderRequest $request)
    {
        //需考慮 OrderDetailController.php
        /*Order::create($request->all());
        return redirect()->route('orders.index');*/
        Order::create([
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'user_id'=>Auth::user()->account,
        ]);
        $rooms = Room::orderBy('created_at', 'DESC')->get();
        if($request->has('image')) {
            OrderDetail::create([
                'order_id'=>$rooms->id,
                'room_id'=>$room,
            ]);
        }
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
        /*$order->update($request->all());
        return redirect()->route('orders.index');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        /*$order->delete();
        return redirect()->route('orders.index');*/
    }
}
