require('jquery-form');
require('jquery');

let collapseOne = document.querySelector('#collapseOne');
$(document).on('submit', 'form', function (e) {
    // il est impératif de commencer avec cette méthode qui va empêcher le navigateur d'envoyer le formulaire lui-même
    e.preventDefault();
    console.log('coucou')
    $form = $(e.target);

    $.ajax({
        type: 'POST',
        url: 'createProspect',
        data: $(this).serialize(),
        success: function (data) {
            if (data === 'success') {
                collapseOne.classList.remove("hide","show");
                collapseOne.classList.add("hide");
                collapseTwo.classList.remove("hide","show");
                collapseTwo.classList.add("show");
                console.log('collapse');

            } else {
                console.log('data pas OK')
            }
        },
    });
});
