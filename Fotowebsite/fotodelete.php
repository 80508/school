
<!--  pagina om een foto te verwijderen uit de database en uit de webserver-->
<?php
	$database=mysqli_connect("localhost", "80537", "r7gvxb", "db80537");
	// id van de foto die verwijder moet worden
	$id=$_GET["id"];
	// de locatie van de foto's waaruit ze verwijderd moeten worden
	$sql = "SELECT thumb_path, img_path FROM beroep3_images WHERE img_id = $id";

	$result = mysqli_query($database, $sql);
	$rij = mysqli_fetch_array($result);

	// foto's verwijderen uit de webserver
	unlink($rij['thumb_path']);
	unlink($rij['img_path']);

	$sql = "DELETE FROM beroep3_images WHERE img_id = $id";


	$result = mysqli_query($database, $sql);
	if ($result) {
		// terug sturen naar de vorige pagina.
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

?>
