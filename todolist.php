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
            <h1></h1>
            <h2></h2>
        </article>
    </section>
    <section>
        <article>
        </article>
    </section>
</main>
<?php require_once 'views/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="module.js"></script>
</body>
</html>