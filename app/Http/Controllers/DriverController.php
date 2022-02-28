<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('driver.index',['drivers'=>$drivers]);
    }

    public function create()
    {
        return view('driver.create');
    }

    public function store()
    {

        $attributes = \request()->validate([
            'name' => 'required',
            'assistantName' => 'required'
        ]);

        Driver::create($attributes);

        return redirect('/driver/index')->with('message','successfully added a new driver');
    }
}
