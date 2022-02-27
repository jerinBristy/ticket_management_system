<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
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

        return back()->with('message', 'Added a new Location.');
    }
}
