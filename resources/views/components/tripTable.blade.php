@props(['trips'])
<table id="bus">

    <tr>
        <th>Bus No</th>
        <th>Bus Type</th>
        <th>Start Time</th>
        <th>From</th>
        <th>To</th>
        <th>Driver Name</th>
    </tr>
    @foreach($trips as $trip)
        <tr>
            <td>{{$trip->bus->plateNo}}</td>
            <td>{{$trip->bus->type}}</td>
            <td>{{$trip->route->startTime}}</td>
            <td>{{$trip->route->from}}</td>
            <td>{{$trip->route->to}}</td>
            <td>{{$trip->driver->name}}</td>
        </tr>
    @endforeach
</table>
