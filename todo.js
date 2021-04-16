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
                console.log(idTask);
                $.post(
                    'apiToDo.php',
                    {
                        action: "displayTask",
                        idTask: idTask
                    },
                    function (result) {
                        console.log(result);
                        let data = JSON.parse(result);
                        $("#toDoList").append("<li class='liTask' id='" + data.id + "'>" + data.title + "</li>");
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

        if ($(thisLi).children('.modal').length === 0) {
            $.post(
                'apiToDo.php',
                {
                    action: "displayTask",
                    idTask: idTask
                },
                function (result) {
                    console.log(result);
                    let data = JSON.parse(result);
                    $(thisLi).append("<div class='modal'>" +
                        "<p>Date création : " + data.start + "</p>" +
                        "<textarea class='liTaskDesc' placeholder='Dis-m\'en plus ...'>" + data.description + "</textarea>" +
                        "<input type='checkbox' class='liTaskFinish'>" +
                        +"</div>");
                }
            )
        }
    });


    /!*MARQUER TACHE COMME FAITE*!/
    $('body').on('click', '.liTaskFinish', function () {
        let liTask = $(this).parents('li');
        let idTask = $(this).parents('li').attr('id');
        console.log(idTask);
        $.post(
            'apiToDo.php',
            {
                action: 'finish',
                idTask: idTask,
            },
            function (endTask) {
                console.log(endTask);
                $(liTask).children('.modal').remove();
                liTask.append("<p class='liTaskEnd'> Fin : " + endTask + "</p>");
                liTask.appendTo($('#doneList'));
            },
            'json'
        );
    });

});
