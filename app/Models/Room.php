<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    //public mixed $id;
    protected $table = 'rooms';

    public function user()
    {
        return $this->belongsToMany(Order::class,'orders');
    }

    public function order()
    {
        return $this->belongsToMany(Order::class,'order_details')->withTimestamps();
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
        'search1',
    ];
}
