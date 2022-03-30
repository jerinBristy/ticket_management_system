@props(['seats','className', 'row'])

<span hidden>{{$count=0}}</span>
@foreach($seats as $seat)
    @if($count>$row)
        <span hidden>{{$count=0}}</span>
    @endif
    <input id="seat{{$seat->name}}" name="seats[]"
           type="checkbox" class="cbox" value="{{$seat->id}}" style="display: none; position: absolute"/>
    <label for="seat{{$seat->name}}" class="{{$className}}">
        {{$seat->name}}
    </label>
    <span hidden>{{$count++}}</span>
    <br>
@endforeach

