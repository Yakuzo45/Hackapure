require('jquery-form');
require('jquery');

let collapseOne = document.querySelector('#collapseOne');
let headingOne = document.querySelector('#headingOne');
let errorsOne = document.querySelector('#errorsOne');
let collapseTwo = document.querySelector('#collapseTwo');
$(document).on('submit', '#formProspect', function (e) {
    e.preventDefault();
    $form = $(e.target);

    $.ajax({
        type: 'POST',
        url: 'createProspect',
        data: $(this).serialize(),
        success: function (data) {
            if (data === 'successProspect') {
                collapseOne.classList.remove("hide", "show");
                headingOne.classList.remove("bg-success", "bg-primary", "bg-danger");
                headingOne.classList.add("bg-success");
                collapseOne.classList.add("hide");
                collapseTwo.classList.remove("hide", "show");
                collapseTwo.classList.add("show");
                errorsOne.classList.add("d-none");

            }
            if (data === 'errorProspect') {
                headingOne.classList.remove("bg-success", "bg-primary", "bg-danger");
                headingOne.classList.add("bg-danger");
                errorsOne.classList.remove("d-none");
            }
        },
    });
});
