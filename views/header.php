<header>
    <div>
        <a href="index.php"><b>dFeL</b></a>
    </div>
    <?php if (!empty($_SESSION)) : ?>
        <div>
            <a href="todolist.php">To do List</a>
            <p><small>Utilisateur : <?= $_SESSION['user'] ?> </small></p>
            <button class="logout">Log Out</button>
        </div>
    <?php else : ?>
        <div>
            <p><em>Comme un calepin, mais en mieux</em></p>
        </div>
    <?php endif; ?>
</header>