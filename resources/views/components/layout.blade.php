<!doctype html>

<title>Ticket Management System</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&family=Staatliches&display=swap" rel="stylesheet">
<script src="{{asset('js/app.js')}}" defer></script>

<body>
<section>
    <nav class="navbar">
        <a href="/" class="logo">Ticket Managementy System</a>
        @auth
            <form method="POST" action="/logout" >
                @csrf
                <button type="submit" class="logout">Logout</button>
            </form>
        @endauth
        @guest
            <a href="/login" class="item">Login</a>
        @endguest
        <a href="/bus/create" class="item">Add Transport</a>
        <a href="/location/create" class="item">Add Location</a>
        <a href="/route/create" class="item">Create Route</a>
        <a href="/bus" class="item">Transports</a>
        <a href="/trip" class="item">Trips</a>
    </nav>

    {{$slot}}

    <footer>
        @if(session()->has('message'))
            <div class="alert alert-success">
                <span>{{ session()->get('message') }}</span>
            </div>
        @endif
    </footer>
</section>
</body>

