<!--  account aanmaken om in te kunnen loggen-->
<?php
require_once 'config.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// als er op de knop geklikt word on een account aan te maken
if(isset($_POST['submit']))
{
// lees alle formuliervelden
$username				= $_POST['username'];
$password				= sha1($_POST['password']);


// controle formuliervelden
if (strlen($username)				> 0 &&
	strlen($password)				> 0 ) {


		//alle data is OK, maak de query
		$query = "INSERT INTO Beroeps4_user
			(username, password)
				  VALUES ('$username', '$password')";

	// voer de query uit
	$result = mysqli_query($mysqli, $query);

	if ($result) {
		// terug sturen naar de inlogpage
		header("Location:welkom.php");
		exit;
	} else {
		echo "<center>Er ging iets mis tijdens het toevoegen </center>";
		echo mysqli_error($mysqli);
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
<h1> Account aanmaken </h1>


<form class="form-container" action="" method="post">
<h2>Inlog gegevens</h2>
<br>
	<!-- formulier om de inlog gegevens in te voeren -->
  <div class="form-group">
   <label for="Username" Gebruiker:</label>
  <input placeholder="Username" class="form-control" type="text" name="username" id="username" required="required">
 </div>

  <div class="form-group">
   <label for="password" Wachtwoord:</label>
   <input placeholder="Password" class="form-control" type="password" name="password" id="password" required="required">
 </div>


  <div class="form-group">
		<!-- knop om de gegevens op te sturen -->
	<input class="btn btn-success" type="submit" name="submit" id="submit" value="Opslaan">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button class="btn btn-danger" onclick="history.back();return false;">Annuleren</button>
 </div>

</form>



</center>

</body>
</html>
