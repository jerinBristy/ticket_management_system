<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Passenger;
use App\Models\PassengerSeat;
use App\Models\Route;
use App\Models\Trip;
use App\Models\Seat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Trip $trip)
    {
        $premiumSeats = Seat::where('bus_id', $trip->bus_id)
            ->where('seat_type_id', 2)
            ->get();
        $regularSeats = Seat::where([
            ['bus_id', '=', $trip->bus_id],
            ['seat_type_id', '=', 1]])->get();
        $letters = range('A', 'z');

        return view('booking.create',['trip'=>$trip,
            'premiumSeats'=>$premiumSeats,
            'regularSeats'=>$regularSeats,
            'letters' => $letters,
            ]);
    }

    public function store(Trip $trip)
    {
        $seats = Seat::where('bus_id', $trip->id)->get();
        $checkedSeats =[];
        foreach ($seats as $seat){
            array_push($checkedSeats,\request($seat->id));
        }

        dd($checkedSeats);
        $passenger = Passenger::where('phone', \request('phone'))->first();
        if($passenger===null){
            $passengerAttribute = \request()->validate([
                'name' => 'required',
                'phone' => 'required'
            ]);

           $passenger= Passenger::create($passengerAttribute)->get();
        }
        PassengerSeat::create([
            'passenger_id' => $passenger->id,
            'trip_id' => $trip->id,
        ]);


    }
}
