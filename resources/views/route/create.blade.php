<x-layout>
    <div class="container">
        <h1>Create a new Route</h1>

        <form action="/route/create" method="post">
            @csrf
            <label for=from><b>From</b></label>
            <select name=from_location_id id=from class="from">
                <option value="">Select start location</option>
                @foreach($locations as $location)
                    <option value="{{$location->id}}">{{$location->name}}</option>
                @endforeach
            </select>

            <label for=to><b>To</b></label>
            <select name=to_location_id id=to class="">
                <option value="">Select Destination</option>
                @foreach($locations as $location)
                    <option value="{{$location->id}}">{{$location->name}}</option>
                @endforeach
            </select>

            <x-form.input type="number" name="regularSeatPrice"/>
            <x-form.input type="number" name="premiumSeatPrice"/>


            <button class="btn">Create</button>

        </form>

    </div>
</x-layout>
