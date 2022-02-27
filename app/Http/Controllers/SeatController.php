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

        $this->createSeats($bus->id,$seats->regularSeat,1);
        $this->createSeats($bus->id,$seats->premiumSeat,2);

        return back()->with('message', 'successfully changed seat layout');
    }

    protected function createSeats(int $bus_id, int $seats, int $seat_type_id)
    {
        while ($seats>0)
        {
            Seat::create([
                'bus_id' => $bus_id,
                'seat_type_id' => $seat_type_id
            ]);
            $seats--;
        }
    }
}
