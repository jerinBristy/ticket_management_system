<x-layout>
    <div class="container">
        <h1>Add a new Location</h1>
        <form action="/location/create" method="POST">
            @csrf
            <x-form.input name="name"/>
            <button class="btn">Create</button>
        </form>
    </div>
</x-layout>
