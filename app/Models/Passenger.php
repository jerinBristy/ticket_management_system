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
        $this->belongsToMany(Seat::class);
    }
}
