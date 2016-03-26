<?php

include('includes/connexion.inc.php');
include('includes/verif_util.inc.php');
if ($connecte == true) { //Si utilisateur connecter
    if (isset($_GET['id'])) {
        $id = mysql_real_escape_string($_GET['id']);
        $sql = "DELETE FROM articles WHERE `articles`.`id` = '$id';"; //supprime de la bdd

        mysql_query($sql);
        $idArticle = $_GET['id'];

        unlink(dirname(__FILE__) . '/data/images/' . $idArticle . '.jpg'); //supprimer l'image du serveur
        header('Location: index.php');

    } else {
        header('Location: index.php');
    }
} else {
    include('includes/header.inc.php');
    ?>

    <h3>Connectez-vous!</h3>
    <?php
    include('includes/footer.inc.php');

}
?>