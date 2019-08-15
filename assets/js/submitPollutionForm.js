require('jquery-form');
require('jquery');

let collapseOne = document.querySelector('#collapseFour');
let headingOne = document.querySelector('#headingFour');
let errorsOne = document.querySelector('#errorsFour');
let collapseTwo = document.querySelector('#collapseTwo');
$(document).on('submit', '#formPollution', function (e) {
    $form = $(e.target);
    $.ajax({
        type: 'POST',
        url: '/createPollution',
        data: $(this).serialize(),
        success: function (data) {
            console.log('on est la');
            if (data === 'successPollution') {
                console.log('success');
                window.location.href="/pollution/bilan"
            }
            if (data === 'errorPollution') {
                headingOne.classList.remove("bg-success", "bg-primary", "bg-danger");
                headingOne.classList.add("bg-danger");
                errorsOne.classList.remove("d-none");
            }
        },
        error : function (error) {
            console.log(error);
        }
    });
})







