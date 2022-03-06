<x-layout>
    <div class="booking">
        <form action="/booking/create/{{$trip->id}}" method="POST">
            @csrf
            <div class="seat-info">
                <h1>Choose Seat</h1>
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
                                    <input id="seat{{$letters[$i]}}{{$count}}" value="{{$seat->id}}" name="{{$seat->id}}"
                                           type="checkbox" class="cbox" style="display: none; position: absolute"/>
                                        <label for="seat{{$letters[$i]}}{{$count}}" class="premiumSeats">
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
                    <input type="checkbox" value="test" name="test">

                    <div class="regularBox">

                        <x-seats :letters="$letters" :seats="$regularSeats" className="regularSeats" :letterCount="$letterCount"/>
                    </div>

                </div>
            </div>
            <div class="passenger-info">
                <h1>Passenger Information</h1>
                    <x-form.input name="name"/>
                    <x-form.input name="phone"/>
                    <x-form.input name="totalSeats" type="number"/>
                    <x-form.input name="totalAmount" type="number"/>
                    <x-form.input name="paidAmount" type="number"/>
                    <x-form.input name="due" type="number"/>

                    <button type="submit" class="btn">Book</button>

            </div>
        </form>
    </div>
</x-layout>
