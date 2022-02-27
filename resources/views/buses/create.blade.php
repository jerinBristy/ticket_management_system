<x-layout>
    <div class="container">
        <h1>Add a new Transport</h1>

        <form method="POST" action="/bus/create">
            @csrf

            <x-form.input name="plateNo"/>
            <x-form.input name="type"/>

            <button class="btn" type="submit">Register Bus</button>

        </form>
    </div>
</x-layout>
