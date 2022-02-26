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

from.addEventListener('change',getMatchedRoutes);

function getMatchedRoutes(){

    for(let i = to.options.length; i >= 0; i--) {
        to.remove(i);
    }

    let promise = fetch('/trip/selected-from/'+ from.value)
        .then((res) => res.json())
        .then((datas) => {
            datas.forEach(function(data) {

                let opt = document.createElement('option');
                opt.appendChild( document.createTextNode(data.to_location.name));
                opt.value = data.to_location.name;

                to.appendChild(opt);

            });


        });
}







