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
			if ($Access_Level < 3) {
				Header("Location: partijtoevoegen.php");
			}
		?>

		<div class="container-fluid ">
			<form method="post" action="#">
				<div class="form-group">

					<label>Lijstnaam</label>
					<input name="Party_Name" type="text" class="form-control" placeholder="Lijst voor de dieren">
				</div>
				<button name="Posted" value="1" type="submit" class="btn btn-primary">Submit</button>
			</form>
			<?php
				$PartyName = $_POST["Party_Name"];

				if (!empty($_POST["Posted"]) && !empty($PartyName) && is_string($PartyName)) {
					if (mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM EU_PARTIES WHERE LOWER(Name) ='".strtolower($PartyName)."'")) == 0) {
                        $ePassword = password_hash("admin", PASSWORD_BCRYPT, ['cost'=>9]);
						if (mysqli_query($mysqli, "INSERT INTO EU_PARTIES (ID, Name, Password, Number_Votes, Description_short, Description, Video_URL) VALUES (NULL, '$PartyName', '$ePassword', 0, 'Placeholder', 'Placeholder', 'Placeholder')")) {
							$PartyID = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM EU_PARTIES WHERE Name='$PartyName'"))["ID"];
							echo "Partij is toegevoegd!<br>
							User: $PartyID,<br>
							Password: admin (Dit moet veranderd worden met de eerste login.)";
						} else {
							echo "Partij is niet toegevoegd, er is een fout opgetreden.\nProbeer het later opnieuw.";
						}
					} else {
						echo "Er bestaat al een partij met deze naam";
					}
				}
			?>
		</div>
	</body>
</html>
