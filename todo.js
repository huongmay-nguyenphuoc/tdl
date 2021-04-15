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
                        $("#toDoList").append("<li>" + data.title + "</li>");
                    }
                )
            },
            'json'
        )
    });
});
