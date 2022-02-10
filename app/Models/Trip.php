<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bus;

class Trip extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function buses()
    {
        $this->belongsTo(Bus::class);
    }
}
