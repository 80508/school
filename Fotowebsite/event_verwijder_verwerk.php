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
<?php include('nav.php'); ?>
</center>


<?php
// lees het config-bestand
require_once 'config.inc.php';
require_once 'session.inc.php';

// lees het ID uit de URL
$id = $_GET['id'];

// is het ID een nummer?
if (is_numeric($id)) {
  // verwijder het lid uit de database
  $result = mysqli_query($mysqli, "DELETE FROM beroep3_event WHERE id = $id");

  // controleer het resuLtaaI
  if ($result) {
    // alles OK, stuur terug naar de homepage
    header("Location:home.php");
    exit;
  } else {
  } echo "<center>Fout tijdens het verwijderen <a href='lid_verwijder.php'>, terug naar Verwijderpagina</a></center>";
} else {
  // het ID was geen nummer
  echo "Onjuist ID.";
  exit;
}
?>
</body>
</html>
