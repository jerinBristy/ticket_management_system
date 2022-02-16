<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bus;

class SeatLayout extends Model
{
    use HasFactory;

    public function bus()
    {
        return $this->belongsToMany(Bus::class);
    }
}
