
<link type="text/css" rel="Stylesheet" href="assets/bjqs.css" />
<link rel="stylesheet" href="assets/demo.css">

<title></title>

<script src="assets/js/jquery-1.8.2.js"></script>

<script src="assets/js/bjqs-1.3.min.js"></script>

<?php
$res = mysql_query("SELECT * FROM articles"); //selection tous les articles
?>



<div id="banner-fade">

	<!-- start Basic Jquery Slider -->
	<ul class="bjqs">
		
<?php

while ($data = mysql_fetch_array($res)) { // on affiche autant d'article qu'il y en a
$id = $data['id'];
echo '<li><div style="max-width:70%;margin-left:15%"><h3>' . ($data['titre']) . '</h3>';
$FileImg = dirname(__FILE__) . '/data/images/' . $id . '.jpg'; //prend l'image de l'article

//affiche tout le contenue de l'article
    if (file_exists($FileImg)) {
    	?>
    	<img src="vignette.jpg.php?id=<?php echo($id) ?>" style=" margin-right:10px; " class=" img-rounded pull-left">

    	<?php
    }
    echo '<p>' . nl2br(htmlspecialchars($data['contenu'])) . '</p>';


    echo '<p>' . date('d/m/Y', $data['date']) . '</p></div></li>';

}
?>

</ul>
<!-- end Basic jQuery Slider -->

</div>
<!-- End outer wrapper -->

<script class="secret-source">
	jQuery(document).ready(function($) {

		$('#banner-fade').bjqs({
			height      : 320,
			width       : 1000,
			responsive  : true
		});

	});
</script>
