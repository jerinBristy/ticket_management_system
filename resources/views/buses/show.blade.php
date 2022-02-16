<x-layout>
    <div class="container">
        <h1>Bus Details</h1>
        <h3>Plate No: {{$bus->plateNo}} </h3>
        <h3>Bus Type: {{$bus->type}} </h3>
        <a class="btn" href="/seat/create/{{$bus->id}}"> Add or Change Seat Layout</a>
        @foreach($seatlayouts as $seatlayout)
            <p>{{$seatlayout->regularSeat}}</p>
            <img src="{{asset(''. $seatlayout->design)}}" class="img">
        @endforeach
    </div>

</x-layout>
