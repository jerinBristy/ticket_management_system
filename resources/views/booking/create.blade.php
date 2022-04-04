<x-layout>
    <div class="booking">
        <form action="/booking/create/{{$trip->id}}" method="POST">
            @csrf
            <div class="seat-info">
                <h1>Choose Seat</h1>
                <h3>Regular Seat Price: {{$routeSeatTypes[0]->pivot->price}}</h3>
                <h3>Premium Seat Price: {{$routeSeatTypes[1]->pivot->price}}</h3>
                <div class="seatBox">
                    @if(count($premiumSeats)!=0)
                        <div class="premiumBox">
                            <x-seats :seats="$premiumSeats" :bookedSeats="$bookedSeats" className="premiumSeats seatName" row="2"/>
                        </div>
                    @endif
                    <div class="regularBox">
                        <x-seats :seats="$regularSeats" :bookedSeats="$bookedSeats" className="regularSeats seatName" row="3"/>
                    </div>
                </div>
            </div>
            <div class="passenger-info">
                <h1>Passenger Information</h1>
                <x-form.input name="name"/>
                <x-form.input name="phone"/>
                <button type="submit" class="btn">Book</button>
            </div>
        </form>
    </div>
</x-layout>
