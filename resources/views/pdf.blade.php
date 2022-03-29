<!doctype html>

<title>Ticket Management System</title>


<body>
<div class="container">
    <h1>Ticket Booking Information</h1>
    <h4>Name: {{$name}}</h4>
    <h4>Phone: {{$phone}}</h4>
    <h4>Total Amount: {{$totalPrice}}</h4>
    <h4>
        SeatNo:
        @foreach($seats as $seat)
            {{$seat->name}},
        @endforeach
    </h4>
</div>
<script>
    const export2Pdf = async () => {

        let printHideClass = document.querySelectorAll('.print-hide');
        printHideClass.forEach(item => item.style.display = 'none');
        await fetch('http://localhost:8000/export-pdf', {
            method: 'GET'
        }).then(response => {
            if (response.ok) {
                response.json().then(response => {
                    var link = document.createElement('a');
                    link.href = response;
                    link.click();
                    printHideClass.forEach(item => item.style.display='');
                });
            }
        }).catch(error => console.log(error));
    }
</script>
</body>
