<?php
include('includes/connexion.inc.php');



if(isset($_GET['email'])){

	$email = $_GET['email'];
	$res = mysql_query('SELECT * FROM newsletter WHERE email = "'.$email.'"');
	$data = mysql_fetch_array($res);

	if(!$data){

		$sql = "INSERT INTO newsletter ( `email`) VALUES ('$email'); ";
		mysql_query($sql);
		echo('OK');
	}else{
		echo("déjà abonné");
	}



}
else{

	echo "ko";
}
?>