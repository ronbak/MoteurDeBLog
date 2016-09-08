<?php
include('includes/connexion.inc.php');
include('includes/header.inc.php');
include('includes/verif_util.inc.php');


$res = mysql_query("SELECT * FROM articles"); //selection tous les articles
$i=0;
$ip = $_SERVER['REMOTE_ADDR'] ;
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


    echo '<p>' . date('d/m/Y', $data['date']) . '</p>';?>

<label id="<?php echo('label'."$id");?>"><?php echo($data['votes']);?> autres personnes aiment cet article</label>


  <?php
    if ($connecte == true) { // si l'utilisateur est connecté alors on peut voir les boutons de modification et de suppression


        ?>


        <a href="article.php?id=<?php echo($id) ?>" class="btn btn-primary">Modifier</a>

        <a href="supprimer_article.php?id=<?php echo($id) ?>" class="btn btn-primary">Supprimer</a>

       
        <?php

    }
    $i++;
    ?>
 <button id="<?php echo('submit'."$id");?>" onclick="test('<?php echo("$id");?>', '<?php echo("$ip"); ?>' )"  class="btn btn-info">J'aime</button>
    <?php
    echo '<div style="clear:both;"></div>';
}


include('includes/footer.inc.php');


?>

<script>
  $(document).ready(function() {


 
  });



function test(id,ip){
 
       $('#submit'+id).prop('disabled', true);

       $.ajax({ 
        type: 'GET', //methode 
        url: 'jaime.php', //url de la page 
        data:  'id=' + id+ '&ip=' + ip, //email de l'utilisateur
        success: function(response){ //récupére la réponse 
          resultat(response,id); //lance le message d'alert si succéou non
       }
   });
    
  }

  function resultat(msg,id){
if(msg=="koip"){
    alert("Vous ne pouvez votez qu'une fois par article uniquement !");
  }else{
        document.getElementById('label'+id).innerHTML = msg+" autres personnes aiment cet article";

  }
}
</script>