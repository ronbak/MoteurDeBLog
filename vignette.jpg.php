<?php

//script d'affichage de l'image redimensioner a la voler

header('Content-Type: image/png');

$id = $_GET['id'];

$FileImg = dirname(__FILE__) . '/data/images/' . $id . '.jpg';


list($width, $height) = getimagesize($FileImg); //récupere la taille de l'image


$ratio = $width / $height;
$w = "200"; //fixe la largeur a 200px
$h = $w / $ratio; // calcul le ration de l'image


$image = imagecreatefromjpeg($FileImg); // Crée une nouvelle image depuis un fichier ou une URL

$nouvelleImage = imagecreatetruecolor($w, $h) or die("Error"); //Crée une nouvelle image en couleurs vraies

imagecopyresampled($nouvelleImage, $image, 0, 0, 0, 0, $w, $h, $width, $height); //Copie, redimensionne, rééchantillonne une image

imagejpeg($nouvelleImage, null, 100); //Affichage de l'image vers le navigateur ou dans un fichier


?>