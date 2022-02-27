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
        $routes = Route::with('fromLocation' , 'toLocation')->groupBy('from_location_id')->get();
        return view('trips.create',['bus' => $bus, 'drivers' => $drivers, 'routes' => $routes]);
    }

    public function show(Trip $trip)
    {
        return view('trips.show',['trip'=>$trip]);
    }

    public function store(Bus $bus)
    {
        $route= Route::where('from_location_id' ,'=', \request('from'))
            ->orwhere('to_location_id','=', \request('to'))->first();

        $driver = Driver::where('name','=',\request('driver'))->first();

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

        $routes = Route::with(['fromLocation', 'toLocation'])->groupBy('from_location_id')->get();
        $drivers= Driver::all();
        $trip_details = Trip::with(['driver','route.fromLocation','route.toLocation'])->where('id',$trip->id)->first();

        return view('trips.edit',['trip'=>$trip, 'routes'=>$routes, 'drivers'=>$drivers, 'trip_details' => $trip_details]);
    }

    public function update(Trip $trip)
    {
        $route= Route::where('from_location_id' ,'=', \request('from'))
            ->orwhere('to_location_id','=', \request('to'))->first();

        $driver = Driver::where('id','=',\request('driver'))->first();

        $attributes = [
            'route_id' => $route->id?? $trip->route_id,
            'driver_id' => $driver->id ?? $trip->driver_id,
        ];

        $trip->update($attributes);
        return back()->with('message','Trip updated');
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();
        return back()->with('message' , 'Successfully Deleted');
    }

    public function getRoutes(String $from)
    {
       $toLocations = Route::where('from_location_id', $from)->with('toLocation')->get();
        return $toLocations;
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
