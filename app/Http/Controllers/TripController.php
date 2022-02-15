<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Bus;

class tripController extends Controller
{
    public function index()
    {
        return view ('trips.list',[
//           for one to many relationship between bus and trip
            'trips' => Trip::with(array('bus'))->get(),
        ]);
    }

    public function create(Bus $bus)
    {
        return view('trips.create',['bus' => $bus]);
    }

    public function store(Bus $bus)
    {
        $attributes = \request()->validate([
            'from' => 'required',
            'to' => 'required',
            'startTime' => 'required'
        ]);
        $route=Route::create($attributes);
        Trip::create([
            'bus_id' => $bus->id,
            'route_id' => $route->id
        ]);

        return back()->with('message', 'successfully added a new Trip');
    }

}
