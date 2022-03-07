<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SeatType;
use App\Models\Bus;
use App\Models\Passenger;

class Seat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bus()
    {
        $this->belongsTo(Bus::class);
    }

    public function seat_types()
    {
        return $this->belongsTo(SeatType::class);
    }

    public function passengers()
    {
        return $this->belongsToMany(Passenger::class,'passenger_seats','seat_id','passenger_id', 'trip_id','price');
    }
}
