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
        <h3 class="heading-child">All Layouts</h3>

        <form action="/seat/store/{{$bus->id}}" method="POST">
            @csrf
            <div id="radio-button-wrapper">
                @foreach($seatlayouts as $seatlayout)
                    <span class="image-radio">
                        <input id="layout-img-{{ $seatlayout->id }}" name="seat_layout_id"
                               type="radio" class="seat-layout" value="{{$seatlayout->id}}"/>
                        <label for="layout-img-{{ $seatlayout->id }}">
                            <img src="{{asset(''. $seatlayout->design)}}" class="img">
                        </label><br>
                    </span>
                @endforeach
            </div>
                <button class="btn">Add or Update layout</button>
        </form>
    </div>
</x-layout>
