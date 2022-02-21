<x-layout>
    <div class="container">
        <h1>Bus Details</h1>
        <h3>Plate No: {{$bus->plateNo}} </h3>
        <h3>Bus Type: {{$bus->type}} </h3>

        @if($bus->seatLayout_id!==null)
            <h3>Current Layout</h3>
            <img src="{{asset(''. $currentlayout->design??'No layouts')}}" class="img">
        @endif
        <br>
        <h3>All Layouts</h3>
        <div id="radio-button-wrapper">
        @foreach($seatlayouts as $seatlayout)

                <span class="image-radio">
                    <input name="layout-img" style="display:none" type="radio"/>
                    <img src="{{asset(''. $seatlayout->design)}}" class="img">
                </span>

        @endforeach
        </div>
        <a class="btn" href="/seat/create/{{$bus->id}}"> Add or Change Seat Layout</a>
    </div>

</x-layout>
