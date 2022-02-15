<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;

class Driver extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function trips()
    {
        return $this->belongsToMany(Trip::class);
    }
}
