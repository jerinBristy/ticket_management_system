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
        $this->hasMany(Seat::class);
    }
}
