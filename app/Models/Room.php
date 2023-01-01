<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    //public mixed $id;
    protected $table = 'rooms';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    protected $fillable = [
        'image',
        'id',
        'shelf_status',
        'introduce',
        'people',
        'amount',
        'order_id',
    ];
}
