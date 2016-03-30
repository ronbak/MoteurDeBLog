<?php
include('includes/connexion.inc.php');


if(isset($_GET['id']) && isset($_GET['ip'])){ 
	$id = mysql_real_escape_string($_GET['id']);
    $ip = mysql_real_escape_string($_GET['ip']) ;
	$res = mysql_query("SELECT `ip` FROM `articles` WHERE `id` = $id ");
$data = mysql_fetch_array($res);

if($data['ip']!=$ip){

$sql="UPDATE articles SET `votes` = votes+1, `ip` = '$ip' WHERE `articles`.`id` = '$id';";
        mysql_query($sql);

$res = mysql_query("SELECT `votes` FROM `articles` WHERE `id` = $id ");
$data = mysql_fetch_array($res);

echo($data['votes']);

}else{
	echo "koip";
}



	}