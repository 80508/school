<!-- pagina om de foto's te bekijken -->
<?php
require_once 'config.inc.php';
require_once 'session.inc.php';
require 'config.php';

ini_set("display_errors", 1);
 ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- bootstrap script en css-->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
	<script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
	<title>Photo Share</title>

</head>
<div class="container">

<body>
  <!--  navigatie en logo-->
<center>
	<?php include('logo.php'); ?>
<?php include('nav.php'); ?>
</center>
<?php
// connectie met de database maken
require 'config.inc.php';


// haalt de ID van het event op.
$userid = $_GET['id'];
// selecteer de foto's van het event die bij de id hoort
$query = "SELECT * FROM beroep3_images WHERE event_id = $userid";

$resultaat = mysqli_query($mysqli, $query);
// als er geen resultaat is gevonden
if ($resultaat == false)
{
	echo mysqli_error($mysqli);
	echo $query;
}

if (mysqli_num_rows($resultaat) == 0)
{
	echo "<center>Nog geen foto geupload</center>";
}
// als er wel een resultaat is gevonden....
else
{

	$rij = mysqli_fetch_array($resultaat);
	echo "<center><p><b> Foto's van event nr $userid</b></p>";

	echo "<table>";

  // de foto's selecteren die bij het event horen
	$database=mysqli_connect("localhost", "80508", "zk0fi908", "DB_80508");
	$sql = "SELECT * FROM beroep3_images WHERE event_id = $userid";
	$result = mysqli_query($database, $sql);
	echo "<div class='container'>";
	echo "<div class='row'>";
	echo "<div class='col-lg-12'>";
	echo "<h3>Gallery</h3>";
	echo "</div>";



// de foto's uitlezen uit de thumbnail path
while ($row = mysqli_fetch_array($result))
{

	echo "<div class='colg-lg-3 col-md-4 col-sm-6'>";
	echo "<a class='uitlees' href='".$row['thumb_path']."' data-lightbox='mygallery' data-title='Foto naam : ".$row['img_name']."' ><img class='uitlees' src='".$row['thumb_path']."'></a><br>";
	?>
<!--		pagina om de foto's te verwijderen-->
	<center>
	<a href="fotodelete.php?id=<?php echo $row["img_id"]; ?>"><center></center>
		<img class= "delete" src="logo/trash.png" width="25" height="25"></center></a>
	</center>
	<?php

	echo "<br><br>";
	echo "</div>";

}

}

?>
</div>
<body>
<!--  terugkeren naar de homepagina-->
<p></center><center><a href='home.php' class="btn btn-dark"><b>Homepage</b></a> </p></center>
<br>
<br>
</body>
</html>
