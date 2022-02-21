<x-layout>
    <div class="container">
        <h1>Update Bus Information</h1>

        <form method="POST" action="/bus/{{$bus->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <label for="plateNo"><b>Plate No</b></label>
            <input type="text" placeholder="Enter PlateNo" name="plateNo" value="{{old('plateNo')??$bus->plateNo}}">
            <x-form.error name="plateNo"/>

            <label for="type"><b>Bus Type</b></label>
            <input type="text" placeholder="Enter bus type" name="type" value="{{old('type')?? $bus->type}}">
            <x-form.error name="type"/>

            <button type="submit" class="btn">Update</button>
        </form>

    </div>

</x-layout>
