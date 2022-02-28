<x-layout>
    <h1>All Locations</h1>
    <table id="table">
        <th>Name</th>
        @foreach($locations as $location)
            <tr>
                <td>{{$location->name}}</td>
            </tr>
        @endforeach
    </table>

    <x-linkButton name="location"/>

</x-layout>
