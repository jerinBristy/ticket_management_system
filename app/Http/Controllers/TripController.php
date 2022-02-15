<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Bus;
use App\Models\Driver;

class tripController extends Controller
{
    public function index()
    {
        return view ('trips.list',[
//           for one to many relationship between bus and trip
            'trips' => Trip::with(array('bus','route','driver'))->get(),
        ]);
    }

    public function create(Bus $bus)
    {
        $drivers= Driver::all();
        return view('trips.create',['bus' => $bus, 'drivers' => $drivers]);
    }

    public function store(Bus $bus)
    {
        $attributes = \request()->validate([
            'from' => 'required',
            'to' => 'required',
            'startTime' => 'required'
        ]);
        $driver = Driver::where('name','=',\request('driver'))->first();
        $route=Route::create($attributes);
        Trip::create([
            'bus_id' => $bus->id,
            'route_id' => $route->id,
            'driver_id' => $driver->id,
        ]);

        return back()->with('message', 'successfully added a new Trip');
    }

}
