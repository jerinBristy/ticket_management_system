<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Models\Route_seat_type;
class RouteController extends Controller
{
    protected $guarded =[];

    public function index()
    {
        $routes = Route::with('fromLocation', 'toLocation')->get();

        return view('route.index',['routes'=>$routes]);
    }

    public function create()
    {
        $locations = Location::all();
        return view('route.create',['locations' => $locations]);
    }

    public function store()
    {
        $attributes = \request()->validate([
            'from_location_id' => 'required',
            'to_location_id' => 'required'
        ]);
        $regularSeatPrice= \request()->validate([
            'regularSeatPrice' => 'required'
        ]);
        $premiumSeatPrice= \request()->validate([
            'premiumSeatPrice' => 'required'
        ]);

        $route = Route::create($attributes)->get()->last();

        $routeSeatType = Route_seat_type::get()->last();
        $route->seatType()->attach(($routeSeatType->id)+1,[
           'route_id' => $route->id,
            'seat_type_id' => 1,
            'price' => $regularSeatPrice
        ]);

        $route->seatType()->attach(($routeSeatType->id)+2,[
            'route_id' => $route->id,
            'seat_type_id' => 2,
            'price' => $premiumSeatPrice
        ]);
        return redirect('/route/index')->with('message', 'Successfully created a new route');
    }
}
