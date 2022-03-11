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
        $seatsArray = \request('seats');
        $seats = Seat::whereIn('id',$seatsArray)->get();
        $passenger = Passenger::where('phone', \request('phone'))->first();
        $route = Route::with('seatType')->find($trip->route_id);
        $routeSeatTypes = $route->seatType->all();
        $count=1;

        if($passenger===null){
            $passengerAttribute = \request()->validate([
                'name' => 'required',
                'phone' => 'required'
            ]);
            Passenger::create($passengerAttribute);
           $passenger= Passenger::all()->last();
        }

        foreach ($seats as $seat){
            $price=0;
            foreach ($routeSeatTypes as $routeSeatType){
               if($routeSeatType->pivot->seat_type_id==$seat->seat_type_id){
                   $price = $routeSeatType->pivot->price;
               }
           }
           $passenger->seat()->attach($count,[
                'passenger_id' => $passenger->id,
                'trip_id' => $trip->id,
                'seat_id' => $seat->id,
                'price' => $price
            ]);
            $count++;
        }

        return redirect('/trip')->with('message','successfully booked');

    }
}
