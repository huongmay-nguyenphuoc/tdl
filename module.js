$(document).ready(function () {
    /*AFFICHAGE FORM*/
    $('body').on('click', '.callForm', function () {
        if ($(this).is('#callFormConnexion')) {
            $.get('views/formconnexion.php',
                function (data) {
                    $('#displayForm').html(data);
                });
        } else {
            $.get('views/forminscription.php',
                function (data) {
                    $('#displayForm').html(data);
                });
        }
    });

    /*INSCRIPTION*/
    $('body').on('click', '#formInscription', function () {
        $('#message').empty();
        $.post(
            'apiModule.php',
            {
                form: 'inscription',
                email: $('#email').val(),
                password: $('#password').val(),
                password2: $('#password2').val(),
            },
            function (data) {
                console.log(data);
                let messages = JSON.parse(data);
                for (let message of messages) {
                    $('#message').append("<p>" + message + "</p>");
                }
            },
        );
    });

    /*CONNEXION*/
    $('body').on('click', '#formConnexion', function () {
        $('#message').empty();
        $.post(
            'apiModule.php',
            {
                form: 'connexion',
                email: $('#email').val(),
                password: $('#password').val(),
            },
            function (data) {
                console.log(data);
                let messages = {
                    fail: 'Vérifie ton email.',
                    failPass: 'Vérifie ton mot de passe.',
                    failFields: 'Remplis tous les champs STP il n\'y en a que deux',
                    success: 'Wow, tu as été connecté.e avec succès ! Redirection dans <span id="count"></span> secondes.'
                };

                for (let code in messages) {
                    if (data === code) {
                        // console.log(messages[message]);
                        $("#message").append("<p>" + messages[code] + "</p>");
                        if (data === "success") {
                            decrement();
                        }
                    }
                }
            },
            'json'
        );
    });


    /*DECONNEXION*/
    $('body').on('click', '.logout', function () {
        $.post(
            'apiModule.php',
            {
                logout: 'logout'
            },
            function (data) {
                console.log(data);
                if (data === "true") {
                    window.location = 'index.php';
                }
            },
            'json'
        );
    });


});

/*FONCTION COMPTEUR*/
let count = 6;
function decrement() {
    count--;
    if (count == 0) {
        window.location = 'todolist.php';
    } else {
        $('#count').html(count);
        setTimeout("decrement()", 1000);
    }
}