@props(['buses'])

<table id="table">

    <tr>
        <th>Plate No</th>
        <th>Type</th>
        <th>Addition</th>
        <th>Actions</th>
    </tr>
    @foreach($buses as $bus)
        <tr>
            <td>{{$bus->plateNo}}</td>
            <td>{{$bus->type}}</td>
            <td>
                <a href="/trip/create/{{$bus->id}}" class="add-trips">Add Trips</a>
                <a href="/bus/create" class="add-bus">Add Transport</a>
            </td>
            <td class="action">
                <div>
                    <a href="/bus/show/{{$bus->id}}" class="details">
                        <x-icon.details/>
                    </a>
                </div>
                <div>
                    <a href="bus/{{$bus->id}}/edit" class="edit">
                        <x-icon.edit/>
                    </a>
                </div>
                <div>
                    <form method="POST" action="/bus/{{$bus->id}}}">
                        @csrf
                        @method('DELETE')
                        <button class="delete">
                            <x-icon.delete/>
                        </button>
                    </form>
                </div>


            </td>
        </tr>
    @endforeach
</table>
