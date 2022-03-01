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
                    <a href="/trip/create/{{$bus->id}}" class="add-trips">
                        <x-icon.addTrip/>
                    </a>
                </div>
                <div>
                    <a href="/bus/create" class="add-bus">
                        <x-icon.addBus/>
                    </a>
                </div>
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
