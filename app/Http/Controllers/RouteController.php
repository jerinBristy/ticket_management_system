<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Route;
use Illuminate\Http\Request;

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

        Route::create($attributes);
        return redirect('/route/index')->with('message', 'Successfully created a new route');
    }
}
