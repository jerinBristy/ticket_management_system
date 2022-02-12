<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class tripController extends Controller
{
    public function index()
    {
        return view ('trips.list',[
            'trips' => Trip::all()
        ]);
    }
}
