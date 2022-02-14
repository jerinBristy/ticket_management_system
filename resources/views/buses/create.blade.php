<x-layout>
    <div class="container">
        <h1>Add a new Transport</h1>

        <form method="POST" action="/bus/create">
            @csrf
            <label for="plateNo"><b>Plate No</b></label>
            <input type="text" placeholder="Enter PlateNo" name="plateNo" value="{{old('plateNo')}}">
            <x-form.error name="plateNo"/>

            <label for="type"><b>Bus Type</b></label>
            <input type="text" placeholder="Enter bus type" name="type" value="{{old('type')}}">
            <x-form.error name="type"/>

            <label for="regularSeat"><b>Regular Seats</b></label>
            <input type="number" placeholder="" name="regularSeat" value="{{old('regularSeat')}}">
            <x-form.error name="regularSeat"/>

            <label for="premiumSeat"><b>Premium Seats</b></label>
            <input type="number" placeholder="" name="premiumSeat" value="{{old('premiumSeat')}}">
            <x-form.error name="premiumSeat"/>

            <label for="routeName"><b>Bus Route</b></label>
            <input type="text" placeholder="Enter bus route" name="routeName" value="{{old('routeName')}}">
            <x-form.error name="routeName"/>

            <label for="startTime"><b>Start Date & Time</b></label>
            <input type="datetime-local" placeholder="Enter Start DateTime" name="startTime" value="{{old('startTime')}}">
            <x-form.error name="startTime"/>

            <label for="driverName"><b>Driver Name</b></label>
            <input type="text" placeholder="Enter Driver Name" name="driverName" value="{{old('driverName')}}">
            <x-form.error name="driverName"/>

            <label for="assistantName"><b>Assistant Name</b></label>
            <input type="text" placeholder="Enter Assistant Name" name="assistantName" value="{{old('assistantName')}}">
            <x-form.error name="assistantName"/>

            <button class="btn" type="submit">Register Bus</button>

        </form>
    </div>

</x-layout>
