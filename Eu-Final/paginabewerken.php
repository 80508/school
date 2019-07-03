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
			if ($Access_Level != 2) {
				Header("Location: partijtoevoegen.php");
			}
			
			if ($_POST["Posted"]) {
				$types = array('image/jpg', 'image/jpeg', 'image/png');
				$PartyData = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM EU_PARTIES WHERE ID=".$Username));
				$Updated_PName = $_POST["Party_Name"];
				$Updated_PVIDEO = $_POST["Party_Video"];
				$Updated_LONGDESC = $_POST["Long_Description"];
				$Updated_SHORTDESC = $_POST["Short_Description"];
				$npc = $_FILES["npicture"];

				if (empty($Updated_PName)) {
					$Updated_PName = $PartyData["Name"];
				}
				if (empty($Updated_PVIDEO)) {
					$Updated_PVIDEO = $PartyData["Video_URL"];
				}
				if (empty($Updated_LONGDESC)) {
					$Updated_LONGDESC = $PartyData["Description"];
				}
				if (empty($Updated_SHORTDESC)) {
					$Updated_SHORTDESC = $PartyData["Description_short"];
				}
				$Edited = false;
				if ($_POST["Posted"] && mysqli_query($mysqli, "UPDATE EU_PARTIES SET Name='$Updated_PName', Video_URL='$Updated_PVIDEO', Description='$Updated_LONGDESC', Description_short='$Updated_SHORTDESC' WHERE ID=$Username")) {
					$Edited = true;
				}
			}
			$PartyData = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM EU_PARTIES WHERE ID=".$Username));
		?>

		<div class="container-fluid ">
			<form method="post" action="#" enctype="multipart/form-data">
				<div class="form-group">
					<label>Lijstnaam.</label>
					<input name="Party_Name" type="text" class="form-control" placeholder="Lijst voor de dieren" value="<?php echo($PartyData["Name"]); ?>" required>
					<label>Video (YouTube URL).</label>
					<input name="Party_Video" type="text" class="form-control" placeholder="https://www.youtube.com/watch?v=MbgCak5eHZQ" value="<?php echo($PartyData["Video_URL"]); ?>">
					<label>Korte lijstbeschrijving (max. 360 tekens).</label>
					<textarea name="Short_Description" class="form-control" rows="3" placeholder="Korte beschrijving hier" maxlength="360" required><?php echo($PartyData["Description_short"]); ?></textarea>
					<label>Lange lijstbeschrijving.</label>
					<textarea name="Long_Description" class="form-control" rows="5" placeholder="Lange beschrijving hier"><?php echo($PartyData["Description"]); ?></textarea>
					<label>Lijst poster.</label>
					<input type="file" name="npicture" class="form-control-file">
				</div>
				<button name="Posted" value="1" type="submit" class="btn btn-primary">Wijzigingen opslaan</button>
				<?php
					if ($_POST["Posted"]) {
						if (isset($npc)) {
							if (in_array($npc['type'], $types)) {
								move_uploaded_file($npc["tmp_name"], "Resources/PartyPosters/".$Username.".".strtolower(end(explode('.',$npc['name']))));
								echo('<div class="alert alert-success" role="alert" style="margin: 25px">Poster geüpload.</div>');
							} else {
								echo('<div class="alert alert-warning" role="alert" style="margin: 25px">Poster niet geüpload.</div>');
							}
						}
						if ($Edited == true) {
							echo('<div class="alert alert-success" role="alert" style="margin: 25px">Lijst data bijgewerkt.</div>');
						} else {
							echo('<div class="alert alert-warning" role="alert" style="margin: 25px">Lijstdata niet bijgewerkt.</div>');
						}
					}
				?>
			</form>
		</div>
	</body>
</html>
