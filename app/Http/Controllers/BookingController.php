<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Trip;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Trip $trip,Bus $bus,Route $route)
    {
//        $layouts = Bus::with(['seatLayout'])->get();
        return view('booking.create',['trip'=>$trip,
            'premiumSeat'=>$bus->seatLayout->premiumSeat,
            'regularSeat'=>$bus->seatLayout->regularSeat,
            'route'=>$route, 'bus'=>$bus]);
    }
}
