<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="style/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Open+Sans&display=swap" rel="stylesheet">
    <title>Du fun en liste | Index</title>
</head>
<body>
<?php require_once 'views/header.php'; ?>
<main>
    <section>
        <article>
            <h1>Du fun en liste !</h1>
            <h2>Comme un calepin, mais en mieux</h2>
        </article>
    </section>
    <section>
        <article id="displayForm">
            <ul>
                <li><input type="checkbox" name="0"><span> Crée ta liste</span></li>
                <li><input type="checkbox" name="1"><span> Ajoute des tâches</span></li>
                <li><input type="checkbox" name="2"><span> Coche des cases</span></li>
                <li><input type="checkbox" name="3"><span> Aies du fun</span></li>
            </ul>
            <?php if (empty($_SESSION)) : ?>
            <div class="displayFormDiv">
                <p>Mais avant ça, <span class="callForm" id="callFormInscription">inscris-toi</span>.</p>
                <p>Ou si tu as déjà un compte, <span class="callForm" id="callFormConnexion">connecte-toi</span>.</p>
                <?php else : ?>
                    <a href="todolist.php">To Do List</a>
                    <button class="logout">Log Out</button>
                <?php endif; ?>
            </div>
        </article>
    </section>
</main>
<?php require_once 'views/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="module.js"></script>
</body>
</html>