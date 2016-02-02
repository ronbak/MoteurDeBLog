<?php
include('includes/connexion.inc.php');
include('includes/header.inc.php');
include('includes/verif_util.inc.php');


$res = mysql_query("SELECT * FROM articles"); //selection tous les articles

while ($data = mysql_fetch_array($res)) { // on affiche autant d'article qu'il y en a
    $id = $data['id'];
    echo '<hr><h3>' . ($data['titre']) . '</h3>';
    $FileImg = dirname(__FILE__) . '/data/images/' . $id . '.jpg'; //prend l'image de l'article

//affiche tout le contenue de l'article
    if (file_exists($FileImg)) {
        ?>
        <img src="vignette.jpg.php?id=<?php echo($id) ?>" style=" margin-right:10px; " class=" img-rounded pull-left">

        <?php
    }
    echo '<p>' . nl2br(htmlspecialchars($data['contenu'])) . '</p>';


    echo '<p>' . date('d/m/Y', $data['date']) . '</p>';


    if ($connecte == true) { // si l'utilisateur est connecté alors on peut voir les boutons de modification et de suppression


        ?>


        <a href="article.php?id=<?php echo($id) ?>" class="btn btn-primary">Modifier</a>

        <a href="supprimer_article.php?id=<?php echo($id) ?>" class="btn btn-primary">Supprimer</a>

        <?php
    }

    echo '<div style="clear:both;"></div>';
}


include('includes/footer.inc.php');


?>

