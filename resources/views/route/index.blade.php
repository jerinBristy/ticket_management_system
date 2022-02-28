<x-layout>
    <h1>All routes</h1>
    <table id="table">
        <th>From</th>
        <th>To</th>
        @foreach($routes as $route)
            <tr>
                <td>{{$route->fromLocation->name}}</td>
                <td>{{$route->toLocation->name}}</td>
            </tr>
        @endforeach
    </table>

    <x-linkButton name="route"/>

</x-layout>
