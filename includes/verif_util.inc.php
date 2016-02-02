<?php

if (isset($_COOKIE) && $_COOKIE != null) {  // si le cookie existe et qu'il n'est pas null
    $sid = $_COOKIE['sid'];
    $res = mysql_query("SELECT email FROM utilisateurs WHERE sid = '$sid'");
    $data = mysql_fetch_array($res);
    $connecte = false;
    if ($data) { //verifie que les informations utilisateurs sont corrects
        $email_util = $data['email'];
        $connecte = true;
    }

} else {
    $connecte = false;
}


?>