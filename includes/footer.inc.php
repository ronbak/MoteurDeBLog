<script src="assets/js/jquery-1.8.2.js"></script>
</div>


<nav class="span4">
    <h2>Menu</h2>

    <ul >

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
            <form action="rechercher.php" method="Post">

                <input style="width:90px;height:13px;"type="text" name="search" size="10">

                <input type="submit" class="btn btn-primary" value="Search">

            </form>

            <div id="alert" >
              <button id="closeAlert" type="button" class="close" data-dismiss="alert">&times;</button>
              <span id="retour"></span> 
          </div>

          <input style="width:90px;height:13px;"type="email" id="abo" size="10">

          <button id="submit" class="btn btn-primary"> Abonnement</button>


      </ul>

  </nav>
</div>

</div>

<footer>
    <p>&copy; JC </p>

</footer>

</div>

<script>
  $(document).ready(function() {
    $('#closeAlert').click(function(){ //si on click sur la croix de l'alert alors elle se ferme

       $('#alert').slideUp(150);
   });



    $('#submit').click(function() { //validation de l'emailpour newsletter au click
     appelNewsletter();

 });

    $('#abo').keypress(function(event) { //validation de l'emailpour newsletter avec la touche entré
        var key = (event.keyCode ? event.keyCode : event.which);
        if(key == '13'){
          appelNewsletter();
          
      }
      event.stopPropagation();
  });
});
</script>



<script type="text/javascript">

   $(document).ready(function() {  //fonction d'affichage et disparition du menu
    $('#alert').hide();
    $('ul').hide();

    $('.span4').mouseenter(function(){
        $('ul').slideDown(150);

    });
    $('.span4').mouseleave(function(){
        $('ul').slideUp(150);

    });

});

</script>

<script>

    function appelNewsletter(){ //envoie les information a newsletter.php
     $.ajax({ 
        type: 'GET', //methode 
        url: 'newsletter.php', //url de la page 
        data:  'email=' + $('#abo').val(), //email de l'utilisateur
        success: function(responce){ //récupére la réponse 
           showAlert(responce); //lance le message d'alert si succéou non
       }


   });  
     $('#abo').val(''); //vide le champ email
 }

 function showAlert(retour){ //affiche l'alert correspondant au message de retour de newsletter.php


    $('#alert').removeClass();

    if(retour=="invalide"){ //si le message est : invalide

        $('#alert').addClass('alert alert-error'); //affiche rouge 
        $('#retour').text(" Email invalide !");
    }

    if(retour=="OK"){ //si le message est : ok


        $('#alert').addClass('alert alert-success'); // affiche vert
        $('#retour').text("Vous êtes abonné !");
    }

    if(retour=="dejaabonne"){

        $('#alert').addClass('alert alert-info');//si le message est : deja abonné

        $('#retour').text("Vous êtes déjà abonné !"); //affiche bleu
    }

    if(retour=="ko"){

        $('#alert').addClass('alert alert-error'); //si le message est : ko

        $('#retour').text("Fatal Error"); //affiche rouge


    }
    $('#alert').slideDown(150); // affiche la div de l'alert

}


</script>

</body>
</html>
