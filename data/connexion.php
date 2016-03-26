<?php
include('includes/connexion.inc.php');
include('includes/header.inc.php');
include('includes/verif_util.inc.php');

if ($connecte == false) { // si l'utilisateur n'est pas connecté


    if (isset($_POST["email"]) && isset($_POST["pwd"])) {

        $email = mysql_real_escape_string($_POST['email']);
        $pwd = mysql_real_escape_string(md5($_POST['pwd']));

        $res = mysql_query("SELECT * FROM utilisateurs WHERE `utilisateurs`.`email` = '$email' AND `utilisateurs`.`pwd` = '$pwd'");
        $data = mysql_fetch_array($res);

        if ($data == null) { //Si le retour de la requet est nul l'utilisateur n'existe pas

            echo "Erreur : email ou mot de passe incorrect !";
        } else {
            $sid = md5($email . time());

            mysql_query("UPDATE utilisateurs SET `sid` = '$sid' WHERE `utilisateurs`.`email` = '$email'");
            setcookie('sid', $sid, time() + 300);
            header('Location: index.php');
        }
    } else {
        ?>
        <!--Formulaire de connection si l'utilisateur n'est pas connecter-->
        <form method="post" action="connexion.php">

            <label> E-mail:</label><input type="email" name="email">
            <label>Mot de passe</label> <input type="password" name="pwd"><br>
            <input type="submit" class="btn btn-primary" value="Connexion"></input>
        </form>

        <?php
    }
} else {
    ?>
    <h3> Vous êtes déjà connecté ! </h3>
    <?php

}
include('includes/footer.inc.php');
?>
