require('jquery-form');
require('jquery');
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

            //clean form
            cleanForm($(this));

            //show success message
            $('#result').html("<div id='message'></div>");
            $('#message').html("<h2> utilisateur créé</h2>").hide();
            event.stopPropagation();
        },
        error: function (xhr, desc, err) {
            alert("error");
        }
    })
    return false;
});
