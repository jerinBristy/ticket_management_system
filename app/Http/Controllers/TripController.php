<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class tripController extends Controller
{
    public function index()
    {
        return view ('trips.list',[
//           for one to many relationship between bus and trip
            'trips' => Trip::with(array('bus'))->get(),
        ]);
    }
}
