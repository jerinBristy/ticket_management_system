<?php

namespace App\Http\Controllers;

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
            'buses' => Bus::with(array('seats'))->get(),
//            'seats' => Bus::with(array('seats'))->select('*')
//                ->groupBy('bus_id')->having("seat_status='available'")
//                ->get()
//                ->toArray(),
         ]);
    }

    public function create()
    {
        return view('buses.create');
    }

    public function store()
    {
        $attributes = \request()->validate([
            'plateNo'=> 'required|min:4|max:4|unique:buses,plateNo',
            'type'=> 'required',
            'driverName' => 'required',
            'assistantName'=> 'required',
        ]);

        Bus::create($attributes);

        return redirect('/bus')->with('message', 'successfully added a new Transport');
    }


}
