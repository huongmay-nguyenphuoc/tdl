<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/style.css">
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
            <p>Crée ta liste, ajoute des tâches, coche des cases ! Tu vas voir, c'est super fun.</p>
            <?php if (empty($_SESSION)) : ?>
                <p>Mais avant ça, <span class="callForm" id="callFormInscription">inscris-toi</span>. Ou si tu as déjà
                    un compte, <span class="callForm" id="callFormConnexion">connecte-toi</span>.</p>
            <?php else : ?>
                <button class="logout">Log Out</button>
            <?php endif; ?>
        </article>
    </section>
</main>
<?php require_once 'views/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="module.js"></script>
</body>
</html>