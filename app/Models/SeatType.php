<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seat;

class SeatType extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function routes()
    {
        return $this->belongsTomany(Route::class,'route_seat_types','seat_type_id','route_id','price');
    }
}
