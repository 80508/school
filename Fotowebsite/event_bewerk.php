<!-- gegevens van de event bewerken -->
<?php
require_once 'config.inc.php';
require_once 'session.inc.php';
// als er op de opslaan knop geklikt word
if(isset($_POST['submit']))
{

// lees alle formuliervelden
$id	= $_POST['id'];
$event_name	= $_POST['event_name'];
$uploader	= $_POST['uploader'];
$date_added	= $_POST['date_added'];


// controle formuliervelden

if (is_numeric($id) &&
	strlen($id)				> 0 &&
	strlen($event_name)		> 0 &&
	strlen($uploader)		> 0 &&
	strlen($date_added)		> 0 ) {

// controle of de data juist is



	$query = "UPDATE beroep3_event
			SET
			event_name = '$event_name',
			uploader = '$uploader',
			date_added = '$date_added'
			WHERE id = $id";



	// voer de query uit
	$result = mysqli_query($mysqli, $query);

	if ($result) {
		// terug sturen naar de homepage
		header("Location:home.php");
		exit;
	}

}else {
	echo 'Niet alle velden waren ingevuld!';
}
}
?>

<?php

require_once 'config.inc.php';
require_once 'session.inc.php';
// id van de event die bewerkt moet worden
$id = $_GET['id'];
// als de id aanwezig is worden de gegevens van de event getoond
if (is_numeric($id)) {

	$result = mysqli_query($mysqli, "SELECT * FROM beroep3_event WHERE id = $id");

	if (mysqli_num_rows($result) == 1) {

		$row = mysqli_fetch_array($result);
// anders worden deze foutmeldingen getoond
	} else {
		echo "Geen lid gevonden.";
		exit;

	}
} else {
	 echo "Onjuist ID.";
     exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- bootstrap script en css-->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<title>Photo Share</title>
</head>
<body>
<center>
	<?php include('logo.php'); ?>
<?php include('nav.php'); ?>
</center>
<center>
	<br>
	<br>
<h1> Event wijzigen </h1>
<br>
<!--  formulier om het event te wijzigen-->
 <form action="event_bewerk.php" method="post">

 			<input type="hidden" name="id" value="<?php echo $id; ?>">
 	<table>

 	<tr>
 			<td><label for="first_name">Event naam</label></td>
 				<td><input type="text" name="event_name" id="event_name" required="required"
				value="<?php echo $row ['event_name']; ?>"></td>
 	</tr>

 	<tr>
 			<td><label for="first_name">Uploader</label></td>
 				<td><input type="text" name="uploader" id="uploader" required="required"
 				value="<?php echo $row ['uploader']; ?>"></td>
 	</tr>

 	<tr>		<td><label for="birth_date">Datum</label></td>
 				<td><input type="date" name="date_added" id="date_added" required="required"
 				value="<?php echo $row ['date_added']; ?>"></td>
 	</tr>
	</table>
	<br>

 	<tr>		<td><input class="btn btn-success" type="submit" name="submit" id="submit" value="Opslaan">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 			<td><button class="btn btn-danger" onclick="history.back();return false;">Annuleren</button>
 	</tr>

</form>







</center>


</body>
</html>
