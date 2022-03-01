@props(['buses'])

<table id="table">

    <tr>
        <th>Plate No</th>
        <th>Type</th>
        <th>Actions</th>
    </tr>
    @foreach($buses as $bus)
        <tr>
            <td>{{$bus->plateNo}}</td>
            <td>{{$bus->type}}</td>
            <td class="action">
                <div>
                    <a href="/trip/create/{{$bus->id}}" class="add-trips tooltip">
                        <x-icon.addTrip/>
                        <span class="tooltiptext">Add Trips</span>
                    </a>
                </div>
                <div>
                    <a href="/bus/create" class="add-bus tooltip">
                        <x-icon.addBus/>
                        <span class="tooltiptext">Add Bus</span>
                    </a>
                </div>
                <div>
                    <a href="/bus/show/{{$bus->id}}" class="details tooltip">
                        <x-icon.details/>
                        <span class="tooltiptext">Details</span>
                    </a>
                </div>
                <div>
                    <a href="bus/{{$bus->id}}/edit" class="edit tooltip">
                        <x-icon.edit/>
                        <span class="tooltiptext">Edit</span>
                    </a>
                </div>
                <div>
                    <form method="POST" action="/bus/{{$bus->id}}}">
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
