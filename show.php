<?php
include('includes/connexion.inc.php');
include('includes/header.inc.php');
include('includes/verif_util.inc.php');

$id = $_GET['id'];




$res = mysql_query("SELECT contenu, titre, date FROM articles WHERE id = $id"); //selection tous les articles

$data = mysql_fetch_array($res) ;

if ($data == null) { //Si le retour de la requet est nul l'utilisateur n'existe pas

            echo "Article Not Found";
        }else{


   
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
