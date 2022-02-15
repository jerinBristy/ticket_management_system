@props(['buses'])

<table id="bus">

    <tr>
        <th>Plate No</th>
        <th>Type</th>
        <th>Driver Name</th>
        <th>Assistant Name</th>
        <th>Seat Remaining</th>
        <th>Actions</th>
    </tr>
    @foreach($buses as $bus)
        <tr>
            <td>{{$bus->plateNo}}</td>
            <td>{{$bus->type}}</td>
            <td>{{$bus->driverName}}</td>
            <td>{{$bus->assistantName}}</td>
            <td>
{{--                {{ $bus->seats()->select('*')--}}
{{--                ->where('seat_status','=','available')--}}
{{--                ->count()}}--}}
            </td>
            <td>
                <a href="/trip/create/{{$bus->id}}" class="greenbtn">Add Trips</a>
                <a href="/bus/edit/{id}" class="bluebtn">Edit</a>

                    <form method="POST" action="/bus/{{$bus->id}}}">
                        @csrf
                        @method('DELETE')
                        <button class="redbtn">Delete</button>
                    </form>

            </td>
        </tr>
    @endforeach
</table>
