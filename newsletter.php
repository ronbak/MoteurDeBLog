<?php
include('includes/connexion.inc.php');



if(isset($_GET['email'])){  //si il y a un email

	if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $_GET['email'])) {

	$email = $_GET['email'];
	$res = mysql_query('SELECT * FROM newsletter WHERE email = "'.$email.'"'); //on vérifie si il existe 
	$data = mysql_fetch_array($res);

	if(!$data){

		$sql = "INSERT INTO newsletter ( `email`) VALUES ('$email'); "; //on l'insert 
		mysql_query($sql);
		echo('OK'); //réussite
	}else{
		echo("dejaabonne"); //déja abonné
	}

}else{
	echo("invalide"); //si l'email n'est pas correct 
}


}
else{

	echo "ko"; //erreur
}
?>