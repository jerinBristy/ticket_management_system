<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Bus;
use App\Models\Driver;
use Illuminate\Validation\Rule;

class tripController extends Controller
{
    public function index()
    {
        return view ('trips.list',[
//           for one to many relationship between bus and trip
            'trips' => Trip::with(array('bus','route.fromLocation','route.toLocation','driver'))->get(),

        ]);
    }

    public function create(Bus $bus)
    {
        $drivers= Driver::all();
        return view('trips.create',['bus' => $bus, 'drivers' => $drivers]);
    }

    public function show(Trip $trip)
    {
        return view('trips.show',['trip'=>$trip]);
    }

    public function store(Bus $bus)
    {
        $attributes = \request()->validate([
            'from' => 'required',
            'to' => 'required',
        ]);
        $driver = Driver::where('name','=',\request('driver'))->first();
        $route=Route::create($attributes);

        Trip::create([
            'bus_id' => $bus->id,
            'route_id' => $route->id,
            'driver_id' => $driver->id,
            'startTime' => \request('startTime')
        ]);

        return back()->with('message', 'successfully added a new Trip');
    }

    public function edit(Trip $trip)
    {
        $routes = Route::all();

        return view('trips.edit',['trip'=>$trip, 'routes'=>$routes]);
    }

    public function update(Trip $trip)
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

        $attributes= $this->validateTrip($trip);
        $trip->update($attributes);
        return back()->with('message','Trip updated');
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();
        return back()->with('message' , 'Successfully Deleted');
    }

    public function getRoutes()
    {
        dd(\request('from'));
       $route = Route::all();
        return $route;
    }

    protected function validateTrip(?Trip $trip = null): array
    {
        $trip ??= new Trip();

        return \request()->validate([
            'plateNo'=> ['required', 'min:4', 'max:4',
                Rule::unique('buses', 'plateNo')->ignore($bus)],
            'type'=> 'required',
        ]);
    }

}
