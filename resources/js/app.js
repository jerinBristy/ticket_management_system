require('./bootstrap');

let successAlert = document.querySelector('.alert-success');
if(successAlert) {
    setTimeout(hideElement, 4000);
    function hideElement() {
        successAlert.style.display = 'none';
    }
}





