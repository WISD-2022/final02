<?php
namespace App\Repositories;

use App\Models\Room;

class RoomRepository
{
    public function index()
    {
        return Room::orderBy('created_at', 'DESC')->get();
    }

    public function find($id)
    {
        return Room::orderBy('created_at', 'DESC')->find($id);
    }
}
