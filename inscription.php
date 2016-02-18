<?php
include('includes/connexion.inc.php');
include('includes/header.inc.php');
include('includes/verif_util.inc.php');
if ($connecte == false) {

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['pwd'])){

 $nom = mysql_real_escape_string($_POST['nom']);
 $prenom = mysql_real_escape_string($_POST['prenom']);
 $email = mysql_real_escape_string($_POST['email']);
 $pwd = mysql_real_escape_string(md5($_POST['pwd']));

  $res = mysql_query("SELECT nom FROM utilisateurs WHERE email = '$email'");
    $data = mysql_fetch_array($res);
    if ($data) { //verifie que les informations utilisateurs sont corrects
        echo ("Email existant !");
    }else{
         $sql = mysql_query("INSERT INTO utilisateurs ( `nom`, `prenom`, `email`, `pwd`) VALUES ('$nom', '$prenom',  '$email', '$pwd'); ");
         echo("Enregistrement : OK");
    }

}else{

?>
    <form method="post" action="inscription.php">

        <label> Nom:</label><input type="text" name="nom">
        <label>Prénom :</label> <input type="text" name="prenom"><br>
        <label> E-mail:</label><input type="email" name="email">
        <label>Mot de passe</label> <input type="password" name="pwd"><br>
        <input type="submit" class="btn btn-primary" value="Inscription">

    </form>

<?php
}
}else{
    ?>
    <h3> Vous êtes déjà connecté ! Création de compte impossible !</h3>
    <?php
}
include('includes/footer.inc.php'); 
?>