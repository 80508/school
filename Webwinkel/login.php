<?php
//lees het config-hestand
require_once 'config.inc.php';
require 'config.php';

// lees alle formuliervelden
$username = $_POST['username'];
$password = $_POST['password'];

// controleer of alle formuliervelden waren ingevuld
if (strlen($username) > 0 && strlen($password) > 0) {

// versleutel het wachtwoord
$password = sha1($password);

// maak de controle-query,
$query = "SELECT * FROM Beroeps4_user
WHERE username = '$username'
AND password = '$password'";

// voer ue query uit
$result = mysqli_query($mysqli, $query);

// controleer of de login correct was
if (mysqli_num_rows($result) == 1) {

// login correr , start de sessie
session_start();

// sla de username op in de sessie
$_SESSION['username'] = $username;

// stuur door naar de homepage
header("Location:schoenen.php");
} else {
// login incorrect. terug naar het login-formulier
header("Location:index.php");
exit;
}
} else {
echo "Niet alle velden zijn ingevuld!";
exit;
}
?>
