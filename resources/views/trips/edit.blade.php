<x-layout>
    <div class="container">

        <form action="/trip/{{$trip->id}}" method="POST">
            @csrf
            @method('patch')

            <label for=from><b>From</b></label>
            <select name=from id=from class="from">
                <option value="">{{$trip_details->route->fromLocation->name}}</option>
                @foreach($routes as $route)
                    @if($route->fromLocation->name!=$trip_details->route->fromLocation->name)
                        <option value="{{$route->from_location_id}}">{{$route->fromLocation->name}}</option>
                    @endif
                @endforeach
            </select>

            <label for=to><b>to</b></label>
            <select name=to id=to class="to">
                <option value="to">{{$trip_details->route->toLocation->name}}</option>
            </select>

            <label for=driver><b>Driver</b></label>
            <select name=driver id=driver class="driver">
                <option value="">{{$trip_details->driver->name}}</option>
                @foreach($drivers as $driver)
                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                @endforeach
            </select>

            <button class="btn" type="submit">Update</button>
        </form>

    </div>
</x-layout>
