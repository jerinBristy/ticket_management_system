<x-layout>
    <div class="booking">
        <h1>Choose Seat</h1>
        <div class="seatBox">
            <div class="premiumBox">
                @while($premiumSeat>0)
                    <div class="premiumSeat">

                    </div>
                    <span hidden>{{$premiumSeat--}}</span>
                    <br>
                @endwhile
            </div>

            <div class="regularBox">
                @while($regularSeat>0)
                    <div class="regularSeat">

                    </div>
                    <span hidden>{{$regularSeat--}}</span>
                    <br>
                @endwhile
            </div>

        </div>
    </div>
</x-layout>
