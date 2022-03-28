<!doctype html>

<title>Ticket Management System</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&family=Staatliches&display=swap" rel="stylesheet">

<body>
    <div class="container">
        <h1>Ticket Booking Information</h1>
        <h4>Name: {{$passenger->name}}</h4>
        <h4>Phone: {{$passenger->phone}}</h4>
        <h4>Total Amount: {{$totalPrice}}</h4>
        <h4>
            SeatNo:
            @foreach($seats as $seat)
                {{$seat->name}}
            @endforeach
        </h4>
        <a href="/export-pdf">Download PDF</a>
    </div>
</body>
