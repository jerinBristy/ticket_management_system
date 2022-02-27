<x-layout>
    <div class="container">
        <h1>Add Trips</h1>
        <form method="POST" action="/trip/create/{{$bus->id}}}">
            @csrf
            <label for=from><b>From</b></label>
            <select name=from id=from class="from">
                <option value="">Select starting point</option>
                @foreach($routes as $route)
                    <option value="{{$route->from_location_id}}">{{$route->fromLocation->name}}</option>
                @endforeach
            </select>

            <label for=to><b>to</b></label>
            <select name=to id=to class="to">
                <option value="to">Select Destination</option>
            </select>

            <x-form.input type="datetime-local" name="startTime" />
{{--{{dd($drivers)}}--}}
            <x-form.select name="driver" :values="$drivers" columnName="name"/>


            <button class="btn" type="submit">Add Trips</button>
        </form>


    </div>
</x-layout>
