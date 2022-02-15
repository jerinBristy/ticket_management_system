<x-layout>
    <div class="container">
        <h1>Add Trips</h1>
        <form method="POST" action="/trip/create/{{$bus->id}}}">
            @csrf
            <label for="from"><b>From</b></label>
            <input type="text" placeholder="" name="from" value="{{old('from')}}">
            <x-form.error name="from"/>

            <label for="to"><b>To</b></label>
            <input type="text" placeholder="" name="to" value="{{old('to')}}">
            <x-form.error name="to"/>

            <label for="startTime"><b>Start Date & Time</b></label>
            <input type="datetime-local" placeholder="Enter Start DateTime" name="startTime" value="{{old('startTime')}}">
            <x-form.error name="startTime"/>

            <label for="driver"><b>Driver Name</b></label>
            <select name="driver" id="driver">
                <option value="">Select a Driver</option>
                @foreach($drivers as $driver)
                    <option value="{{$driver->name}}">{{$driver->name}}</option>
                @endforeach
            </select>
            <button class="btn" type="submit">Add Trips</button>
        </form>


    </div>
</x-layout>
