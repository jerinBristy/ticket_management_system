<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Route;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function routes()
    {
        return $this->hasMany(Route::class);
    }
}
