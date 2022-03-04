<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Route;
use App\Models\Trip;
use App\Models\Seat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Trip $trip,Bus $bus,Route $route)
    {
        $premiumSeats = Seat::where('bus_id', $bus->id)
            ->where('seat_type_id', 2)
            ->get();
        $regularSeats = Seat::where([
            ['bus_id', '=', $bus->id],
            ['seat_type_id', '=', 1]])->get();
        $letters = range('A', 'z');

        return view('booking.create',['trip'=>$trip,
            'premiumSeats'=>$premiumSeats,
            'regularSeats'=>$regularSeats,
            'letters' => $letters,
            'route'=>$route, 'bus'=>$bus]);
    }

    public function store()
    {
        $passengerAttribute = \request()->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);
    }
}
