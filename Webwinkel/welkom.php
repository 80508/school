<!DOCTYPE html>
<!--  nadat de gebruiker aan account heeft aangemaakt word de gebruiker hiernaartoe
gestuurd, dezelfde pagina als de index maar dan met een melding dat er een account is aangemaakt-->
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- bootstrap script en css-->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="main.css">

</head>
<body>
<center>

<div class="container-fluid bg">
	<div class="row">
	<div class="col-md-4 col-sm-4 col-xs-12"></div>
	<div class="col-md-4 col-sm-4 col-xs-12">

		<div class="alert alert-success">
<strong>Uw account is aangemaakt!</strong>
</div>
<form class="form-container" action="login.php" method="post">

  <div class="form-group">
   <input placeholder="Username" class="form-control" type="text" name="username" id="username" required="required">
 </div>

  <div class="form-group">
      <input placeholder="Password" class="form-control" type="password" name="password" id="password" required="required">
 </div>
  <div class="form-group">
   <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Inloggen">
 </div>

</form>
<br>
<br>



</center>
</body>
</html>
