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
        $bus->seat_layout_id = \request('seat_layout_id');
        $bus->save();
        $seats = SeatLayout::select('regularSeat','premiumSeat')->where('id',$seatLayout)->first();

        $letters = range('A', 'z');
        $letterCount = $this->createPremiumSeats($bus->id,$seats->premiumSeat,2,$letters);
        $this->createRegularSeats($bus->id,$seats->regularSeat,1 ,$letters, $letterCount);

        return back()->with('message', 'successfully changed seat layout');
    }

    protected function createPremiumSeats(int $bus_id, int $seats, int $seat_type_id, array $letters): int
    {
        $letterCount =0;
        while ($seats>0)
        {
            $count = 0;
            while($count<3)
            {
                Seat::create([
                    'bus_id' => $bus_id,
                    'seat_type_id' => $seat_type_id,
                    'name' => $letters[$letterCount].$count

                ]);
                $seats--;
                $count++;
            }

            $letterCount ++;
        }
        return $letterCount;
    }

    protected function createRegularSeats(int $bus_id, int $seats, int $seat_type_id, array $letters , int $letterCount)
    {
        while ($seats>0)
        {
            $count = 0;
            while($count<4)
            {
                Seat::create([
                    'bus_id' => $bus_id,
                    'seat_type_id' => $seat_type_id,
                    'name' => $letters[$letterCount].$count

                ]);
                $count++;
                $seats--;
            }
            $letterCount ++;
        }
    }
}
