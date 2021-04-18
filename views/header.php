<header>
    <div>
        <a href="index.php">dFeL</a>
    </div>
    <?php if (!empty($_SESSION)) : ?>
        <div>
            <a href="todolist.php">To do List</a>
            <p>Utilisateur : <?= $_SESSION['user'] ?> </p>
            <button class="logout">Log Out</button>
        </div>
    <?php else : ?>
        <div>
            <p>Comme un calepin, mais en mieux</p>
        </div>
    <?php endif; ?>
</header>