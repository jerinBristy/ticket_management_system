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

        $route = Route::with('seatType')->find($trip->route_id);
        $routeSeatTypes = $route->seatType->all();

        return view('booking.create',['trip'=>$trip,
            'premiumSeats'=>$premiumSeats,
            'regularSeats'=>$regularSeats,
            'letters' => $letters,
            'routeSeatTypes' => $routeSeatTypes,
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
                'seat_id' => $seat->id,
                'price' => $price
            ]);
            $totalPrice += $price;
            $count++;
        }

        return view('/booking/show',[
            'passenger' => $passenger,
            'totalPrice' => $totalPrice,
            'seats' => $seats
        ])->with('message','successfully booked');

    }

    public function show()
    {
        return view('booking.show');
    }

    public function exportPdf() {
        $pdf = PDF::loadView('booking.pdf',[
            'passenger' => $passenger,
            'totalPrice' => $totalPrice,
            'seats' => $seats
        ]); // <--- load your view into theDOM wrapper;
        $path = public_path('pdf_docs/'); // <--- folder to store the pdf documents into the server;
        $fileName =  time().'.'. 'pdf' ; // <--giving the random filename,
        $pdf->save($path . '/' . $fileName);
        $generated_pdf_link = url('documents/'.$fileName);
        return response()->json($generated_pdf_link);
    }

}
