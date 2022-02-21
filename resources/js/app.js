require('./bootstrap');

let successAlert = document.querySelector('.alert-success');
if(successAlert) {
    setTimeout(hideElement, 4000);
    function hideElement() {
        successAlert.style.display = 'none';
    }
}

$(".image-radio img").click(function(){
    alert(1);
    $(this).prev().attr('checked',true);
})





