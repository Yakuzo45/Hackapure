require('jquery-form');
require('jquery');

let collapseOne = document.querySelector('#collapseTwo');
let headingOne = document.querySelector('#headingTwo');
let errorsOne = document.querySelector('#errorsTwo');
let collapseTwo = document.querySelector('#collapseThree');
$(document).on('submit', '#formInstall', function (e) {
    e.preventDefault();
    $form = $(e.target);

    $.ajax({
        type: 'POST',
        url: 'createInstall',
        data: $(this).serialize(),
        success: function (data) {
            if (data === 'successInstall') {
                collapseOne.classList.remove("hide", "show");
                headingOne.classList.remove("bg-success", "bg-primary", "bg-danger");
                headingOne.classList.add("bg-success");
                collapseOne.classList.add("hide");
                collapseTwo.classList.remove("hide", "show");
                collapseTwo.classList.add("show");
                errorsOne.classList.add("d-none");

            }
            if (data === 'errorInstall') {
                headingOne.classList.remove("bg-success", "bg-primary", "bg-danger");
                headingOne.classList.add("bg-danger");
                errorsOne.classList.remove("d-none");
            }
        },
    });
});
