require('./bootstrap');

let successAlert = document.querySelector('.alert-success');
if(successAlert) {
    setTimeout(hideElement, 4000);
    function hideElement() {
        successAlert.style.display = 'none';
    }
}

// $(".image-radio img").click(function(){
//     alert(1);
//     $(this).prev().attr('checked',true);
// })

let from = document.querySelector('.from');
let to = document.querySelector('.to');
from.addEventListener('change',function (){
    $routes = fetch('/trip/selected-from').then(function(response) {
        console.log(response.json());
    })
    // console.log($routes);
});








