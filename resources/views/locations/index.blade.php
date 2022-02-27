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
    <div class="link">
        <a href="/location/create" class="btn-a">Add Location</a>
    </div>
</x-layout>
