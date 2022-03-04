@props(['letters','seats','className','letterCount'])

<span hidden>{{$count=0}}</span>
@for($i=$letterCount+1;$i<count($letters)-1;)
    @foreach($seats as $seat)

        @if($count>3)
            <span hidden>{{$count=0}}</span><span hidden>{{$i++}}</span>
        @endif
        <input id="seat{{$letters[$i]}}{{$count}}" name="seatNo"
               type="checkbox" class="cbox" value="{{$letters[$i]}}{{$count}}" style="display: none; position: absolute"/>
        <label for="seat{{$letters[$i]}}{{$count}}" class="{{$className}}">
            {{$letters[$i]}}{{$count}}
        </label>
        <span hidden>{{$count++}}</span>
        <br>
    @endforeach
    @break
@endfor


