@props(['seats','className', 'row','bookedSeats'])

<span hidden>{{$count=0}}</span>
@foreach($seats as $seat)
    @if($count>$row)
        <span hidden>{{$count=0}}</span>
    @endif
    @if(in_array($seat->id,$bookedSeats))

        <input id="bookedSeat"
               type="text" class="cbox" value="{{$seat->id}}" style="display: none; position: absolute"/>
        <label for="bookedSeat" class="{{$className}} booked">
            {{$seat->name}}
        </label>
    @else
    <input id="seat{{$seat->name}}" name="seats[]"
           type="checkbox" class="cbox" value="{{$seat->id}}" style="display: none; position: absolute"/>
    <label for="seat{{$seat->name}}" class="{{$className}}">
        {{$seat->name}}
    </label>
    @endif
    <span hidden>{{$count++}}</span>
    <br>

@endforeach

