<?php
require 'config.php';
require 'session.inc.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// zet alle foutmeldingen aan
ini_set("display_errors", 1);

// als er op de knop geklikt moet er een niewe schoen gemaakt worden

		//alle data is OK, maak de query
	$query2 = "SELECT * FROM Beroeps4_catogorie";

	// voer de query uit
	$result2 = mysqli_query($mysqli, $query2);

    $option = "";
	if ($result2) {
        while ($row = mysqli_fetch_array($result2)) {
            // code...
            $option .= "<option>".$row['Naam']."</option>";
        }
	} else {
		echo "<center>Er ging iets mis tijdens het toevoegen </center>";
		echo mysqli_error($mysqli);
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
	<title>asgasdf</title>
</head>
<body>
<center>
<h1> Schoenen </h1>


<form class="form-container" action="" method="post">
<h2>Selecteer catogorie</h2>
<br>
	<!-- formulier om de inlog gegevens in te voeren -->

<select class="catogorie" name="catogorie">
<?php
echo $option;
?>
</select>

<br><br>
	<!-- knop om de gegevens op te sturen -->
	<input class="btn btn-success" type="submit" name="submit" id="submit" value="Opslaan">
	&nbsp;&nbsp;
	<button class="btn btn-danger" onclick="history.back();return false;">Annuleren</button>
 </div>

</form>



</center>

</body>
</html>
