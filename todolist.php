<?php
session_start();
var_dump($_SESSION);
if (empty($_SESSION)) {
    header("Location: index.php");
} else {
    require_once('database/database.php');
    $db = new database();
    $tasksUser = $db->selectTasks($_SESSION['id']);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Du fun en liste | To do List</title>
</head>
<body>
<?php require_once 'views/header.php'; ?>
<main>
    <section>
        <article>
            <h1>To do List</h1>
            <h2>Utilisateur : <?= $_SESSION['user'] ?> </h2>
            <button class="logout">Log Out</button>
        </article>
    </section>
    <section id="tableLists">
        <article class="list">
            <h3>Taches a faire</h3>
            <ul id="toDoList">
                <?php foreach ($tasksUser['toDo'] as $key => $task) : ?>
                    <li class="liTask" id="<?= $task['id'] ?>">
                        <input class="liTaskTitle" readonly="readonly" value="<?= $task['title'] ?>">
                    </li>
                <?php endforeach; ?>
            </ul>
            <form methode="post">
                <input type="text" id="userId" hidden value="<?= $_SESSION['id'] ?>">
               <input type="text" id="titleTask" placeholder="Ajouter une tache"> <button id="addTask">+</button>
            </form>
        </article>

        <article class="list">
            <h3>Taches terminées</h3>
            <ul id="doneList">
                <?php foreach ($tasksUser['done'] as $key => $task) : ?>
                    <li class="liTask" id="<?= $task['id'] ?>">
                        <input class="liTaskTitle" readonly="readonly" value="<?= $task['title'] ?>">
                            <input type='checkbox' checked disabled class='liTaskEnd'> <?= $task['end'] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </article>

    </section>
</main>
<?php require_once 'views/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="module.js"></script>
<script src="todo.js"></script>
</body>
</html>