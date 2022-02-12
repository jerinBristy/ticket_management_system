@props(['trips'])
<table id="trip">

    <tr>
        <th>Bus No</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Route</th>
    </tr>
    @foreach($trips as $trip)
        <tr>
            <td>{{$trip->bus_id}}</td>
            <td>{{$trip->startTime}}</td>
            <td>{{$trip->endTime}}</td>
            <td>{{$trip->route}}</td>

        </tr>
    @endforeach
</table>
