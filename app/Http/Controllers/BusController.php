<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use App\Models\Bus;

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

        $routeAttributes = \request()->validate([
            'routeName' =>'required',
            'startTime' => 'required',
        ]);

        if (\request()->get('regularSeat')){
            $seatAttributes = \request()->validate([
                'seatType' => 'required'
            ]);
         }

        $buses = Bus::create($busAttributes)->get();

        $route = Route::create($routeAttributes);

        return redirect('/bus')->with('message', 'successfully added a new Transport');
    }

    public function update()
    {
        return view('buses.update');
    }
}
