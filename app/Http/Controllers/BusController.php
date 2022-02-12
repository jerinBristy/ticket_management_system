<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class BusController extends Controller
{
    public function index()
    {
        return view('buses.list',[
            'buses' => Bus::ALl(),
        ]);
    }
}
