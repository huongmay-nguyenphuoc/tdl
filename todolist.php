<?php
session_start();
var_dump($_SESSION);
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
            <h2>Utilisateur : <? /*= $_SESSION['user'] */ ?> </h2>
            <button class="logout">Log Out</button>
        </article>
    </section>
    <section>
        <article class="list">
            <h3>Taches a faire</h3>
            <div id="toDoList">
            </div>
            <form methode="post">
                <input type="text" id="userId" hidden value="<?= $_SESSION['id']?>">
                <input type="text" id="titleTask" placeholder="Ajouter une tache">
                <button id="addTask">+</button>
            </form>
        </article>

        <article class="list">
            <h3>Taches terminées</h3>
            <div id="doneList">
            </div>
        </article>
    </section>
</main>
<?php require_once 'views/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="module.js"></script>
<script src="todo.js"></script>
</body>
</html>