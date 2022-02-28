<x-layout>
    <h1>Driver Details</h1>
    <table id="table">
        <th>Driver Name</th>
        <th>Assistant Name</th>

        @foreach($drivers as $driver)
            <tr>
                <td>{{$driver->name}}</td>
                <td>{{$driver->assistantName}}</td>
            </tr>
        @endforeach
    </table>

    <x-linkButton name="driver"/>

</x-layout>
