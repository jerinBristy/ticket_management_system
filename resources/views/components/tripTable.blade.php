@props(['trips'])
<table id="table">

    <tr>
        <th>Bus No</th>
        <th>Bus Type</th>
        <th>Start Time</th>
        <th>From</th>
        <th>To</th>
        <th>Driver Name</th>
        <th>Actions</th>
    </tr>
    @foreach($trips as $trip)
        <tr>
            <td>{{$trip->bus->plateNo}}</td>
            <td>{{$trip->bus->type}}</td>
            <td>{{$trip->startTime}}</td>
            <td>{{$trip->route->fromLocation->name}}</td>
            <td>{{$trip->route->toLocation->name}}</td>
            <td>{{$trip->driver->name}}</td>
            <td class="action">
                <div>
                    <a href="/trip/book/{{$trip->id}}" class="add-trips tooltip">
                        <x-icon.booking/>
                        <span class="tooltiptext">Book</span>
                    </a>
                </div>

                <div>
                    <a href="/trip/show/{{$trip->id}}" class="details tooltip">
                        <x-icon.details/>
                        <span class="tooltiptext">Details</span>
                    </a>
                </div>
               <div>
                   <a href="trip/{{$trip->id}}/edit" class="edit tooltip">
                       <x-icon.edit/>
                       <span class="tooltiptext">Edit</span>
                   </a>
               </div>
                <div>
                    <form method="POST" action="/trip/{{$trip->id}}}">
                        @csrf
                        @method('DELETE')
                        <button class="delete tooltip">
                            <x-icon.delete/>
                            <span class="tooltiptext">Delete</span>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</table>
