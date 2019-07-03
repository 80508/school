<?php
	$database=mysqli_connect("localhost", "80508", "Zk0fi908", "DB_80508");
	$id=$_GET["id"];
	$sql = "DELETE FROM beroep3_images WHERE event_id = $id";
	$result = mysqli_query($database, $sql);
	if ($result) {
		// terug sturen naar de vorige pagina.
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	 // in de detailpagiina plaatsen
	 $row = mysqli_fetch_array($result);


	?>
	 <center>
	 <a class="deleteall" href="deleteall.php?id=<?php echo $row["event_id"]; ?>"><center>Verwijder alles</a>
	 </center>
	 <?php

?>
