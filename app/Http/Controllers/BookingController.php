<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Passenger;
use App\Models\PassengerSeat;
use App\Models\Route;
use App\Models\Trip;
use App\Models\Seat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

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

        $allSeats = Seat::select('id')->where('bus_id', '=', $trip->bus_id)->pluck('id');

        $route = Route::with('seatType')->find($trip->route_id);
        $routeSeatTypes = $route->seatType->all();

        $bookedSeats = PassengerSeat::whereIn('seat_id', $allSeats)->pluck('seat_id')->toArray();
        return view('booking.create',['trip'=>$trip,
            'premiumSeats'=>$premiumSeats,
            'regularSeats'=>$regularSeats,
            'routeSeatTypes' => $routeSeatTypes,
            'bookedSeats' => $bookedSeats
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
        $totalPrice=0;
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
                'bus_id' => $trip->bus_id,
                'seat_id' => $seat->id,
                'price' => $price
            ]);
            $totalPrice += $price;
            $count++;
        }

        return view('/booking/show',[
            'passenger' => $passenger,
            'totalPrice' => $totalPrice,
            'seats' => $seats,
        ])->with('message','successfully booked');

    }

    public function show()
    {
        return view('booking.show');
    }

    public function exportPdf(Request $request)
    {
        $seats = json_decode($request->seats);
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'totalPrice' => $request->price,
            'seats' => $seats
            ];
        $pdf = PDF::loadView('pdf',$data); // <--- load your view into theDOM wrapper;
        Storage::put('C:\Users\shakil\Downloads/invoice1.pdf', $pdf->output());

        return $pdf->download('invoice.pdf');
    }

}
