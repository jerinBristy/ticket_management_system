<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class SeatController extends Controller
{
    public function create(Bus $bus)
    {
        return view('seat.create', ['bus'=> $bus]);
    }
}
