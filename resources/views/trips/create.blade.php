<x-layout>
    <div class="container">
        <h1>Add Trips</h1>
        <form method="POST" action="/trip/create/{{$bus->id}}}">
            @csrf
            <x-form.input name="from"/>

            <x-form.input name="to"/>

            <x-form.input type="datetime-local" name="startTime" />
{{--{{dd($drivers)}}--}}
            <x-form.select name="driver" :values="$drivers" columnName="name"/>


            <button class="btn" type="submit">Add Trips</button>
        </form>


    </div>
</x-layout>
