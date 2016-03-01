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

            <input style="width:90px;height:13px;"type="email" id="abo" size="10">

            <button id="submit" class="btn btn-primary"> Abonnement</button>
            <label id="retour" value=""></label>

        </ul>

    </nav>
</div>

</div>

<footer>
    <p>&copy; JC </p>

</footer>

</div>

<script>
  $(function() {
        $('#submit').click(function() { //au click du bouton abonement lance le script php avec l'email en parametre
          $.ajax({
            type: 'GET', //methode de transfert 
            url: 'newsletter.php', //page du script 
            data:  'email=' + $('#abo').val(), //email
           success: function(response){ //affiche le type de retour si succé ou non
            $("#retour").text(response);

        }

    });  
          $('#abo').val('');
      });
    });
</script>



<script type="text/javascript">

   $(document).ready(function() {

    $('ul').hide();

    $('.span4').mouseenter(function(){
        $('ul').slideDown(150);

    });
    $('.span4').mouseleave(function(){
        $('ul').slideUp(150);

    });

});

</script>

</body>
</html>
