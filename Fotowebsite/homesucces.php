<!-- pagina waar de gebruiker naartoe word gestuurd als de gebruiker succesvol foto's heeft ge upload  -->
<?php
//Lees het config bestand
require_once 'config.inc.php';
require_once 'session.inc.php';
//Lees alle leden uit de database
$result = mysqli_query($mysqli, "SELECT * FROM beroep3_event ORDER BY last_name ASC");

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Photo Share</title>
	<!-- bootstrap script en css-->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="main.css">

</head>


<body>
<center>
	<!--  Logo en navigatie -->
	<?php include('logo.php'); ?>
	</center>
<center>
<?php include('nav.php'); ?>
</center>

<center>

<?php
require 'config.inc.php';

$query = "SELECT * FROM beroep3_event";

$resultaat = mysqli_query($mysqli, $query);

if (mysqli_num_rows($resultaat) == 0)
{
	echo "<p>Er zijn geen resultaten gevonden.</p>";
}






else
{
	echo "<br><br>";
	echo "<br>";
	echo "<center><table class='table table-sm table-inverse'>";
	echo "<div <span style='width:500px;' class='alert alert-success'>
	<strong>Uw foto's zijn toegevoegd bij uw gallerij </strong>
	<img src='logo/gallery.png' alt='Details' title='Details' width='35' height='35'></a>
	</div>";
	echo "<tr>";
	echo "<td><b>Nr</b></td>";
	echo "<td><b>Event</b></td>";
	echo "<td><b>Uploader</b></td>";
	echo "<td><b>Date</b></td>";
	echo "<td><b>Upload</b></td>";
	echo "<td><b>Gallerij</b></td>";
	echo "<td><b>Edit</b></td>";
	echo "<td><b></b></td>";
	echo "</tr>";
	// gegevens van de events uit de database uitlezen
	while ($rij = mysqli_fetch_array($resultaat))
	{
		echo "<tr>";
		echo "<td>" . $rij['id'] . "</td>";
		echo "<td>" . $rij['event_name'] . "</td>";
		echo "<td>" . $rij['uploader'] . "</td>";
		echo "<td>" . $rij['date_added'] . "</td>";

		echo "<td><a href='foto.php?event_id=" . $rij['id'] . "'><img src='logo/foto.png' alt='FotoUploaden' title='Foto Uploaden' width='31' height='31'></a></td>";
		echo "<td> <a href='event_detail.php?id=".$rij['id']."'><img src='logo/gallery.png' alt='Details' title='Details' width='35' height='35'></a></td>";
		echo "<td> <a href='event_bewerk.php?id=".$rij['id']."'><img src='logo/pencil.png' alt='Bewerkknop' title='Bewerken' width='31' height='31'></a></td>";
		echo "<td> <a href='event_verwijder.php?id=".$rij['id']."'> <img src='logo/trash.png' alt='Verwijderknop' title='Verwijderen' width='31' height='31'></a></td>";
		echo "</tr></div>";
	}
	echo "</table><br><br></center>";


}
?>


</center>
	 <script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>
