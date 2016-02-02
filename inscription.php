<?php
include('includes/connexion.inc.php');
include('includes/header.inc.php');
include('includes/verif_util.inc.php');
if ($connecte == false) {
?>

    <form method="post" action="inscription.php">

        <label> Nom:</label><input type="text" name="nom">
        <label>Prénom :</label> <input type="text" name="prenom"><br>
        <label> E-mail:</label><input type="email" name="email">
        <label>Mot de passe</label> <input type="password" name="pwd"><br>
        <input type="submit" class="btn btn-primary" value="Inscription">

    </form>

<?php
}else{
    ?>
    <h3> Vous êtes déjà connecté ! Création de compte impossible !</h3>
    <?php
}
include('includes/footer.inc.php');
?>