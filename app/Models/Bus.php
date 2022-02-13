<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;
use App\Models\Seat;
use App\Models\Route;

class Bus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function seats(){
        return $this->hasMany(Seat::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class, 'trip_id');
    }

    public function routes()
    {
        return $this->belongsToMany(Route::class);
    }
}
