<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\SeatLayout;
use Illuminate\Http\Request;
use App\Models\Bus;

class SeatController extends Controller
{
    public function store(Bus $bus)
    {
        $seatLayout = \request()->validate([
            'seat_layout_id' => 'required'
        ]);

        $seats = SeatLayout::select('regularSeat','premiumSeat')->where('id',$seatLayout)->first();
        $premium_seat = $seats->premiumSeat;
        while ()
        Seat::create()
        return back()->with('message', 'successfully changed seat layout');
    }
}
