<x-layout>
    <div class="booking">
        <form action="/booking/create/{{$trip->id}}" method="POST">
            @csrf
            <div class="seat-info">
                <h1>Choose Seat</h1>
                <h3>Regular Seat Price: {{$routeSeatTypes[0]->pivot->price}}</h3>
                <h3>Premium Seat Price: {{$routeSeatTypes[1]->pivot->price}}</h3>
                <div class="seatBox">
                    <span hidden>{{$letterCount=-1}}</span>
                    @if(count($premiumSeats)!=0)
                        <span hidden>{{$letterCount+=1}}</span>
                        <div class="premiumBox">
                            {{--                    <x-seats :letters="$letters" :seats="$premiumSeats" className="premiumSeats" :letterCount/>--}}
                            <span hidden>{{$count=0}}</span>
                            @for($i=0;$i<count($letters)-1;)
                                @foreach($premiumSeats as $seat)
                                    @if($count>2)
                                        <span hidden>{{$count=0}}</span><span hidden>{{$i++}}</span>
                                    @endif
                                    <input id="seat{{$letters[$i]}}{{$count}}" value="{{$seat->id}}" name="seats[]"
                                           type="checkbox" class="cbox" style="display: none; position: absolute"/>
                                        <label for="seat{{$letters[$i]}}{{$count}}" class="premiumSeats seatName">
                                            {{$letters[$i]}}{{$count}}
                                        </label>
                                    <span hidden>{{$count++}}</span>
                                    <span hidden>{{$letterCount=$i}}</span>
                                    <br>
                                @endforeach
                                @break
                            @endfor
                        </div>
                    @endif
                    <div class="regularBox">

                        <x-seats :letters="$letters" :seats="$regularSeats" className="regularSeats seatName" :letterCount="$letterCount"/>
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
