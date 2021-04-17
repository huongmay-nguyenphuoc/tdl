$(document).ready(function () {

    /*AJOUT TACHE*/
    $('#addTask').click(function (e) {
        e.preventDefault();
        $.post(
            'apiToDo.php',
            {
                action: "createTask",
                userId: $('#userId').val(),
                titleTask: $('#titleTask').val()
            },
            function (idTask) {
                $.post(
                    'apiToDo.php',
                    {
                        action: "displayTask",
                        idTask: idTask
                    },
                    function (result) {
                        let data = JSON.parse(result);
                        $("#toDoList").append("<li class='liTask' id='" + data.id + "'>" +
                            "<input class='liTaskTitle' readOnly='readonly' value='" + data.title + "'</li>");
                        $('#titleTask').val('');
                    }
                )
            },
            'json'
        )
    });


    /*AFFICHAGE DETAILS D'UNE TACHE*/
    $('body').on('click', '#toDoList .liTask', function () {
        let idTask = this.id;
        let thisLi = this;

        //Ferme le détail de l'ancienne tache active
        if ($(thisLi).children('.modal').length === 0) {
            $('li').children('.modal').fadeOut(200, function () {
                $(this).remove();
            });
            $('li').children('.liTaskTitle').attr("readonly", true);
            $('li').children('.liTaskTitle').css('cursor', 'default');

            //récupère détails de la tache et l'affiche
            $.post(
                'apiToDo.php',
                {
                    action: "displayTask",
                    idTask: idTask
                },
                function (result) {
                    let data = JSON.parse(result);
                    let date = new Date(data.start);
                    let options = [{day: 'numeric'}, {month: 'short'}, {year: 'numeric'}];
                    date = date.toLocaleDateString('en-Us', options);
                    $("<div class='modal'>" +
                        "<div><span>Création : " + date + "</span><input  title='marquer comme terminée' type='checkbox' class='liTaskFinish'></div>" +
                        "<div><textarea class='liTaskDesc' placeholder='description'>" + data.description + "</textarea>" +
                        "<button class='addDescription'>Sauvegarder</button></div>"
                        + "</div>").hide().appendTo($(thisLi)).fadeIn(200);
                });
        }
    });


    /*UPDATE TITRE*/
    // clique sur le titre pour pouvoir le modifier
    $('body').on('click', '.liTaskTitle', function () {
        let liTask = $(this).parents('li');
        if (liTask.children('.modal').length >= 1) {
            $(this).attr("readonly", false);
            $(this).css('cursor', 'text');
        }
    });
    // change valeur si nouvelle valeur est pas vide
    $('body').on('focusin', '.liTaskTitle', function () {
        $(this).data('val', $(this).val());
    }).on('change', '.liTaskTitle', function () {
        let oldTitle = $(this).data('val');
        let newTitle = $(this).val();
        if (newTitle.length >= 1) {
            let idTask = $(this).parents('li').attr('id');
            $.post(
                'apiToDo.php',
                {
                    action: "updateTitle",
                    idTask: idTask,
                    newTitle: newTitle
                },
                function (result) {
                    $(this).val(newTitle);
                });
        } else {
            $(this).val(oldTitle);
        }
    });


    /*AJOUT DESCRIPTION*/
    $('body').on('click', '.addDescription', function () {
        let liTask = $(this).parents('li');
        let idTask = $(this).parents('li').attr('id');
        let textarea = $(liTask).find('.liTaskDesc');
        let description = $(liTask).find('.liTaskDesc').val();
        $.post(
            'apiToDo.php',
            {
                action: "addDescription",
                idTask: idTask,
                description: description
            },
            function (result) {
                $(textarea).text(description);
            });
    });


    /*MARQUER TACHE COMME FAITE*/
    $('body').on('click', '.liTaskFinish', function () {
        let liTask = $(this).parents('li');
        let idTask = $(this).parents('li').attr('id');
        $.post(
            'apiToDo.php',
            {
                action: 'finish',
                idTask: idTask,
            },
            function (endTask) {
                console.log(endTask);
                $(liTask).children('.modal').remove();
                liTask.fadeOut(300, function () {
                    liTask.append("<input type='checkbox' checked disabled class='liTaskEnd'>" + endTask);
                    $(liTask).hide().appendTo($('#doneList')).fadeIn(300);
                });
            },
            'json'
        );
    });

});
