<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bus;

class Route extends Model
{
    use HasFactory;
    protected  $guarded=[];

    public function bus()
    {
        return $this->belongsToMany(Bus::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function seatType()
    {
        return $this->belongsTomany(SeatType::class,'route_seat_type','route_id','seat_type_id','price');
    }

    public function fromLocation()
    {
        return $this->belongsTo(Location::class,'from_location_id');
    }


    public function toLocation()
    {
        return $this->belongsTo(Location::class,'to_location_id');
    }
}
