<x-layout>
    <div class="container">
        <h1>Add a new Driver</h1>
        <form action="/driver/create" method="POST">
            @csrf
            <x-form.input name="name"/>
            <x-form.input name="assistantName"/>

            <button type="submit" class="btn">Add driver</button>
        </form>
    </div>
</x-layout>
