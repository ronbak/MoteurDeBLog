<?php
include('includes/connexion.inc.php');



if(isset($_GET['email'])){  //si il y a un email

	$email = $_GET['email'];
	$res = mysql_query('SELECT * FROM newsletter WHERE email = "'.$email.'"'); //on vérifie si il existe 
	$data = mysql_fetch_array($res);

	if(!$data){

		$sql = "INSERT INTO newsletter ( `email`) VALUES ('$email'); "; //on l'insert 
		mysql_query($sql);
		echo('OK'); //réussite
	}else{
		echo("Déjà abonné"); //déja abonné
	}



}
else{

	echo "ko"; //erreur
}
?>