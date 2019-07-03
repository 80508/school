<!doctype html>
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

		<style>
			body {
				font-family: Verdana, 'Helvetica Neue', Helvetica, Arial, 'sans-serif';
			}

			.navbar {
				background: #2dace3!important;
			}

			.status {
				margin-right: 25px;
			}
		</style>
	</head>
	<body>
		<?php
			include 'header.php';
		?>

		<div class="container-fluid ">
			<div class="card" style="padding-bottom: 2%">
                <center>
                <h5 class="card-text">Stem op de lijst van de jongerenpartij waarvan de 2 speerpunten voor jou ook erg belangrijk zijn.</h5>
            </center>
            </div>

	<!--	<form method="post" action="#">
				<div class="form-group">
                    <center>
					<label>Vul hier je studentennummer in!</label>
                    </center>
					<input name="StudentID" type="number" class="form-control" placeholder="82410">

					<label>Opleiding:</label>
					<select name="Course" class="form-control">
						<?php
							$AllCourses = mysqli_query($mysqli, "SELECT * FROM EU_COURSES");
							while($CourseInfo = mysqli_fetch_assoc($AllCourses)) {
								echo("<option value=\"".$CourseInfo["ID"]."\">".$CourseInfo["Name"]."</option>");
							}
						?>
					</select>

					<label>Kies een van de <?php echo(mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM EU_PARTIES"))); ?> partijen.</label>
					<select name="SelectedParty" class="form-control">
						<?php
							$AllParties = mysqli_query($mysqli, "SELECT * FROM EU_PARTIES");
							while($PartyInfo = mysqli_fetch_assoc($AllParties)) {
								echo("<option value=\"".$PartyInfo["ID"]."\">".$PartyInfo["Name"]."</option>");
							}
						?>
					</select>
				</div>
				<button name="Posted" value="1" type="submit" class="btn btn-primary">Stem</button>
			</form>-->

			<?php
				$StudentID = $_POST["StudentID"];
				$PostedCourse = $_POST["Course"];
				$SelectedParty = $_POST["SelectedParty"];
				if (!empty($_POST["Posted"])) {
					if ((is_numeric($StudentID) || is_int($StudentID))) {
						if (mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM EU_COURSES WHERE ID=$PostedCourse"))>0 && mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM EU_VOTES WHERE StudentID='$StudentID'"))==0) {
							if (mysqli_query($mysqli, "INSERT INTO EU_VOTES (ID, StudentID, Party_ID, Course) VALUES (NULL, $StudentID, $SelectedParty, $PostedCourse)")) {
								if (mysqli_query($mysqli, "update EU_PARTIES set Number_Votes = Number_Votes+1 where ID=$SelectedParty")) {
									echo('<div class="alert alert-success" role="alert" style="margin: 25px">Uw stem is uitgebracht.</div>');
								} else {
									echo('<div class="alert alert-danger" role="alert" style="margin: 25px">MYSQLI FOUT.</div>');
									echo(mysqli_error($mysqli));
								}
							} else {
								echo('<div class="alert alert-danger" role="alert" style="margin: 25px">MYSQLI FOUT.</div>');
								echo(mysqli_error($mysqli));
							}
						} else if (mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM EU_VOTES WHERE StudentID='$StudentID'"))>0) {
							echo('<div class="alert alert-danger" role="alert" style="margin: 25px">U heeft al gestemd.</div>');
						}
					} else if (!is_numeric($StudentID) || !is_int($StudentID) || empty($StudentID)) {
						echo('<div class="alert alert-danger" role="alert" style="margin: 25px">U heeft een onjuist- of geen studentennummer ingevoerd.</div>');
					}
				}
			?>
		</div>
	</body>
</html>
