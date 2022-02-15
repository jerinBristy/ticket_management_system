<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Seat;

class BusController extends Controller
{
    public function index()
    {
//        $buses = Bus::with(array('seats'))->get();
//        foreach ($buses as $bus) {
//            $seats = $bus->seats()->select('*')
//                ->where('seat_status','==','available')
//                ->get()
//                ->count();
//            dd($seats);
//        }
        return view('buses.index',[
            'buses' => Bus::with('seats')->get(),
         ]);
    }

    public function create()
    {
        return view('buses.create');
    }

    public function store()
    {
        $busAttributes = \request()->validate([
            'plateNo'=> 'required|min:4|max:4|unique:buses,plateNo',
            'type'=> 'required',
            'driverName' => 'required',
            'assistantName'=> 'required',
        ]);

        $buses = Bus::create($busAttributes);

//        $this->createSeatandRoute('regularSeat',1,250,$buses->id);
//        $this->createSeatandRoute('premiumSeat',2,500,$buses->id);

        return redirect('/bus')->with('message', 'successfully added a new Transport');
    }

    public function update()
    {
        return view('buses.update');
    }

    public function createSeatandRoute(string $seatType,int $seat_type_id,int $price,int $bus_id){
        $routeAttributes = \request()->validate([
            'from' =>'required',
            'to' => 'required',
            'startTime' => 'required',
        ]);
        if (\request()->get($seatType)){
            $seatAttributes = \request()->validate([
                $seatType => 'required'
            ]);
            $counter= int()(\request()->get($seatType));
            while($counter!=0){
                Seat::create([
                    'bus_id' => $bus_id,
                    'seat_type_id' => $seat_type_id
                ]);
                Route::create(array_merge(
                    ['seat_type_id' => $seat_type_id],
                    ['price' => $price],
                    $routeAttributes
                ));
                $counter--;
            };
        }
    }
}
