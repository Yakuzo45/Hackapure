require('jquery-form');
require('jquery');

let collapseOne = document.querySelector('#collapseThree');
let headingOne = document.querySelector('#headingThree');
let errorsOne = document.querySelector('#errorsThree');
let collapseTwo = document.querySelector('#collapseFour');
$(document).on('submit', '#formConsumption', function (e) {
    e.preventDefault();
    $form = $(e.target);
    $.ajax({
        type: 'POST',
        url: 'createConsumption',
        data: $(this).serialize(),
        success: function (data) {
            if (data === 'successConsumption') {
                collapseOne.classList.remove("hide", "show");
                headingOne.classList.remove("bg-success", "bg-primary", "bg-danger");
                headingOne.classList.add("bg-success");
                collapseOne.classList.add("hide");
                collapseTwo.classList.remove("hide", "show");
                collapseTwo.classList.add("show");
                errorsOne.classList.add("d-none");

            }
            if (data === 'errorConsumption') {
                headingOne.classList.remove("bg-success", "bg-primary", "bg-danger");
                headingOne.classList.add("bg-danger");
                errorsOne.classList.remove("d-none");
            }
        },
    });
});
