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
let output = document.querySelector('.output');

from.addEventListener('change',getMatchedRoutes);

function getMatchedRoutes(){
    fetch('/trip/selected-from')
        .then((res) => res.json())
        .then((data) => {
            console.log(data)
            // data.forEach(function (route){
            //
            // }
        });
}







