<x-layout>
    <div class="container">
        
        <label for=from><b>From</b></label>
        <select name=from id=from class="from">
            <option value="">select From</option>
            @foreach($routes as $route)
                <option value="{{$route->from_location_id}}">{{$route->fromLocation->name}}</option>
            @endforeach
        </select>

        <label for=to><b>to</b></label>
        <select name=to id=to class="to">
            <option value="">Select to</option>
        </select>

        <div class="output">

        </div>

    </div>
</x-layout>
