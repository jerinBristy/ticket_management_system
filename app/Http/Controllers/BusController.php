<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\SeatLayout;
use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Seat;
use Illuminate\Validation\Rule;

class BusController extends Controller
{
    public function index()
    {
//        $buses = Bus::with(array('seats'))->get();
//        foreach ($buses as $bus) {
//            $seats = $bus->seats()->select('*')
//                ->where('seat_status','==','available')
//                ->get()
//                ->count();
//            dd($seats);
//        }
        return view('buses.index',[
            'buses' => Bus::with('seats')->get(),
         ]);
    }

    public function create()
    {
        return view('buses.create');
    }

    public function store()
    {
        $busAttributes = $this->validateBus();

        $buses = Bus::create($busAttributes);

//        $this->createSeatandRoute('regularSeat',1,250,$buses->id);
//        $this->createSeatandRoute('premiumSeat',2,500,$buses->id);

        return redirect('/bus')->with('message', 'successfully added a new Transport');
    }

    public function show(Bus $bus)
    {
        $seatlayouts=SeatLayout::all();
        $currentlayout=SeatLayout::find($bus->seatLayout_id);
        return view('buses.show', ['bus' =>$bus, 'seatlayouts' => $seatlayouts,'currentlayout' => $currentlayout]);
    }

    public function edit(Bus $bus)
    {
        return view('buses.edit',['bus'=>$bus]);
    }

    public function update(Bus $bus)
    {
        $attributes= $this->validateBus($bus);

//        if($attributes['thumbnail'] ?? false){
//            $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');
//        }

        $bus->update($attributes);
        return back()->with('message','Bus updated');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return back()->with('message' , 'Successfully Deleted');
    }

    protected function validateBus(?Bus $bus = null): array
    {
        $bus ??= new Bus();

        return \request()->validate([
            'plateNo'=> ['required', 'min:4', 'max:4',
                Rule::unique('buses', 'plateNo')->ignore($bus)],
            'type'=> 'required',
        ]);
    }

    public function createSeatandRoute(string $seatType,int $seat_type_id,int $price,int $bus_id){
        $routeAttributes = \request()->validate([
            'from' =>'required',
            'to' => 'required',
            'startTime' => 'required',
        ]);
        if (\request()->get($seatType)){
            $seatAttributes = \request()->validate([
                $seatType => 'required'
            ]);
            $counter= int()(\request()->get($seatType));
            while($counter!=0){
                Seat::create([
                    'bus_id' => $bus_id,
                    'seat_type_id' => $seat_type_id
                ]);
                Route::create(array_merge(
                    ['seat_type_id' => $seat_type_id],
                    ['price' => $price],
                    $routeAttributes
                ));
                $counter--;
            };
        }
    }
}
