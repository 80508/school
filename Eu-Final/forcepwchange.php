<html>
	<head>
		<meta charset="UTF-8">
		<title>GLR Stemt</title>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js" type="text/javascript"></script>

		<link rel="stylesheet" href="Resources/CSS/main.css">
	</head>
	<body>
		<?php
			include 'header.php';
			$Found_Password = $_POST["New_Password"];
			if (!empty($Found_Password) && strlen($Found_Password)>=8) {
				$ePassword = password_hash($Found_Password, PASSWORD_BCRYPT, ['cost'=>9]);
				mysqli_query($mysqli, "UPDATE EU_PARTIES SET Password='$ePassword' WHERE ID=$Username");
				Header("Location: index.php");
			}
		?>
		
		<div class="container-fluid ">
			<form method="post" action="#">
				<div class="form-group">
					<label>Nieuw wachtwoord.<br>LET OP: MINIMAAL 8 TEKENS LANG. MAG NIET "ADMIN" ZIJN.</label>
					<input name="New_Password" type="password" class="form-control" placeholder="Password">
				</div>
				<button name="Posted" value="1" type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</body>
</html>
