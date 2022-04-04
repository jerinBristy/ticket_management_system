<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PassengerSeat extends Pivot
{
    use HasFactory;

    protected $table = 'passenger_seats';
    protected $guarded = [];
}
