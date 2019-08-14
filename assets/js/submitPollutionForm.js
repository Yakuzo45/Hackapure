require('jquery-form');
require('jquery');

let collapseOne = document.querySelector('#collapseFour');
let headingOne = document.querySelector('#headingFour');
let errorsOne = document.querySelector('#errorsFour');
let collapseTwo = document.querySelector('#collapseTwo');
$(document).on('submit', '#formPollution', function (e) {
    e.preventDefault();
    $form = $(e.target);
    $.ajax({
        type: 'POST',
        url: 'createPollution',
        data: $(this).serialize(),
        success: function (data) {
            if (data === 'successPollution') {
                collapseOne.classList.remove("hide", "show");
                headingOne.classList.remove("bg-success", "bg-primary", "bg-danger");
                headingOne.classList.add("bg-success");
                collapseOne.classList.add("hide");
                collapseTwo.classList.remove("hide", "show");
                collapseTwo.classList.add("show");
                errorsOne.classList.add("d-none");
            }
            if (data === 'errorPollution') {
                headingOne.classList.remove("bg-success", "bg-primary", "bg-danger");
                headingOne.classList.add("bg-danger");
                errorsOne.classList.remove("d-none");
            }
        },
    });
});
