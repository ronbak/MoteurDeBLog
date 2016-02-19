<?php
include('includes/header.inc.php');
include('includes/connexion.inc.php');
include('includes/verif_util.inc.php');

if(isset($_POST['search'])){

 		$search = explode(" ",mysql_real_escape_string($_POST['search']));
     


$i=0;
$req = "SELECT * FROM articles WHERE contenu LIKE '%$search[$i]%' OR titre LIKE '%search[$i]%'  ";
$like="";
while($i<count($search)){
$like.=" OR contenu LIKE '%search[$i+1]%' OR titre LIKE '%search[$i+1]%' ";
$i++;
}
        $res = mysql_query($req.$like);            
 if (mysql_num_rows($res) > 0) {
          

while($data = mysql_fetch_array($res))
{
	



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
}else{

	echo'Rien ne correspond a votre recherche.';


}
        

}else{
	echo("Aucune recherche");
}


include('includes/footer.inc.php');
?>