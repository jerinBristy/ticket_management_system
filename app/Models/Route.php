<?php

namespace App\Models;

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
        return $this->belongsTomany(SeatType::class);
    }
}
