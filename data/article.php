<?php
include('includes/header.inc.php');
include('includes/connexion.inc.php');
include('includes/verif_util.inc.php');

if ($connecte == true) { // vérifier que l'utilisateur est connecter

if (isset($_POST['titre']) && isset($_POST['contenu'])) { // si il y aun contenue et un titre

    $titre = mysql_real_escape_string($_POST['titre']);
    $contenu = mysql_real_escape_string($_POST['contenu']) . "\n";
    $date = time();
    if (isset($_POST['id'])) { //met a jour l'article choisie


        $id = mysql_real_escape_string($_POST['id']);
        $sql = "UPDATE articles SET `titre` = '$titre', `contenu` = '$contenu', `date` = '$date'  WHERE `articles`.`id` = '$id';";
        mysql_query($sql);


        $idArticle = $_POST['id'];

    } else { //insert le nouvel article

        $sql = "INSERT INTO articles ( `titre`, `contenu`, `date`) VALUES ('$titre', '$contenu',  '$date'); ";

        mysql_query($sql);
        $idArticle = mysql_insert_id();


    }
    $tmpName = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmpName, dirname(__FILE__) . '/data/images/' . $idArticle . '.jpg'); //ajoute l'image

    header('Location: index.php');
} elseif (isset($_GET['id'])) { //si il y a uniquement l'id permet la modification de l'article


$id = mysql_real_escape_string($_GET['id']);

$res = mysql_query("SELECT * FROM `articles` WHERE `id` = $id ");
$data = mysql_fetch_array($res);
?>
<!--            formulaire de modification-->
<form method="POST" action="article.php" enctype="multipart/form-data">

    <input type="hidden" name="id" value=<?php echo($id); ?>>

    <h4>Titre:</h4>
    <input type="text" name="titre" value="<?php echo($data['titre']); ?>"></input><br>

    <h4>Contenu:</h4>
    <textarea rows="20" cols="60" name="contenu"><?php echo($data['contenu']); ?> </textarea><br>


    <?php

    } else {


    ?>
    <!--            formluraire d'ajout-->
    <form method="POST" action="article.php" enctype="multipart/form-data">


        <h4>Titre:</h4>
        <input type="text" name="titre"></input><br>

        <h4>Contenu:</h4>
        <textarea rows="20" cols="60" name="contenu"> </textarea><br>

        <?php

        } ?>
        <input type="file" name="image"></input><br>

        <input type="submit" class="btn-primary"></input>


    </form><?php
    } else {  // Si l'utilisateur n'est pas connecté
        ?>
        <h3>Connectez-vous!</h3>
        <?php

    }
    include('includes/footer.inc.php');
    ?>


