</div>
<nav class="span4">
    <h2>Menu</h2>

    <ul>
    <form action="rechercher.php" method="Post">

        <input style="width:90px;height:13px;"type="text" name="search" size="10">

        <input type="submit" value="Search">

        </form>
        <li><a href="index.php">Accueil</a></li>
        


        <?php

        if ($connecte == true) {
            ?>
            <li><a href="article.php">Rédiger un article</a></li>
            <li><a href="deconnexion.php">Deconnexion</a></li>

            <?php
        } else {
            ?>
            <li><a href="connexion.php">Connexion</a></li>
            <li><a href="inscription.php">Inscription</a></li>

        <?php }

        ?>
    </ul>

</nav>
</div>

</div>

<footer>
    <p>&copy; JC </p>

</footer>

</div>

</body>
</html>
