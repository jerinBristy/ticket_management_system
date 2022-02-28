<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('location.index',['locations'=>$locations]);
    }

    public function create()
    {
        return view('location.create');
    }

    public function store()
    {

        $attribute = \request()->validate([
            'name' => 'required'
        ]);

        Location::create($attribute);

        return redirect('/location/index')->with('message', 'Added a new Location.');
    }
}
