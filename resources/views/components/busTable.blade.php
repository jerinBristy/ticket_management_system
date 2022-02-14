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
                <a href="/book" class="greenbtn">Book</a>
                <a href="/bus/edit/{id}" class="bluebtn">Edit</a>
                <a href="/bus/{id}" class="redbtn">Delete</a>
            </td>
        </tr>
    @endforeach
</table>
