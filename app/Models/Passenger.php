<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seat;

class Passenger extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function seat()
    {
        return $this->belongsToMany(Seat::class,'passenger_seats','passenger_id','seat_id','bus_id', 'trip_id','price');
    }
}
