<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class BusController extends Controller
{
    public function index()
    {
        return view('buses.index',[
            'buses' => Bus::ALl(),
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
