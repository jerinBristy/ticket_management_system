@props(['buses'])

<table id="bus">

    <tr>
        <th>Plate No</th>
        <th>Type</th>
        <th>Driver Name</th>
        <th>Assistant Name</th>
    </tr>
    @foreach($buses as $bus)
        <tr>
            <td>{{$bus->plateNo}}</td>
            <td>{{$bus->type}}</td>
            <td>{{$bus->driverName}}</td>
            <td>{{$bus->assistantName}}</td>

        </tr>
    @endforeach
</table>
