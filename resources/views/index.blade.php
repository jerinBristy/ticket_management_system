
<x-layout>
    @include('buses._header')
    <div class="header">
        @auth
            <h1>Welcome {{ auth()->user()->username }}</h1>
        @endauth
    </div>

</x-layout>
