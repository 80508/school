<!-- pagina om een event toe te voegen -->
<?php
require_once 'config.inc.php';
require_once 'session.inc.php';
// als er op de knop word geklikt
if(isset($_POST['submit']))
{
	// lees alle formuliervelden
$gender	= $_POST{'gender'};
$event_name	= $_POST{'event_name'};
$uploader	= $_POST{'uploader'};
$date_added	= $_POST{'date_added'};


// controle formuliervelden

if (strlen($event_name)		> 0 &&
	strlen($uploader)	> 0 &&
	strlen($date_added)			> 0) {

// controle of de data juist is



	$query = "INSERT INTO beroep3_event
	(event_name, uploader, date_added)
	VALUES (
		'$event_name',
		'$uploader',
		'$date_added')";


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
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap script en css-->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" type="text/css" href="main.css">
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
<h1> Nieuwe Gallerij</h1>
<!-- formulier om te gegevens in te voeren van de event -->
 <form action="event_nieuw.php" method="post" enctype="multipart/form-data">

 <table>

 	<tr>
 			<td><label for="first_name">Event naam:</label></td>
 				<td><input type="text" name="event_name" id="event_name" required="required"
				value="<?php echo $row ['event_name']; ?>"></td>
 	</tr>

 	<tr>
 			<td><label for="first_name">Uploader:</label></td>
 				<td><input type="text" name="uploader" id="uploader" required="required"
 				value="<?php echo $row ['uploader']; ?>"></td>
 	</tr>

 	<tr>		<td><label for="birth_date">Datum toegevoegd:</label></td>
 				<td><input type="date" name="date_added" id="date_added" required="required"
 				value="<?php echo $row ['date_added']; ?>"></td>
 	</tr>

 	<tr>
	</table>

 			<br>

 			<input class="btn btn-success" type="submit" name="submit" id="submit" value="Opslaan">

 			<button class="btn btn-danger" onclick="history.back();return false;">Annuleren</button>
 	</tr>

</form>
</center>


</body>
</html>
