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

		<link rel="stylesheet" href="Resources/CSS/main.css">
	</head>

	<body>
		<?php
			include 'header.php';
		?>
		<div class="container-fluid">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="Resources/Images/GLR.jpg/800x400?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="Resources/Images/people-walking.jpeg/800x400?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="Resources/Images/Check.jpeg/800x400?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				<br>
			</div>
			<div class="card">
				<center>
				<h1 class="card-title">Studenten van GLR hebben een mening!</h1>
				<p class="card-text">Stem op wat jij belangrijk vindt voor jongeren in Europa!</p>
			</center>
			</div>

			<div class='card-deck'>
			<?php
			$PARTY = 0;
			$RowN = 0;
			$Result = mysqli_query($mysqli, "SELECT * FROM EU_PARTIES");
			while ($Data = mysqli_fetch_array($Result)) {
				if ($RowN >= 4) {
					echo ("</div><div class='card-deck'>");
					$RowN = 0;
				}
				$PARTY+=1;
				$RowN+=1;
				echo "<div class='card'>
					<div class='card-body'>
						<h5 class='card-title'>Lijst $PARTY: ".$Data['Name']."</h5>
						<p class='card-text'>".$Data['Description_short']."</p>
						<a href='partij.php?Party=".$Data['ID']."' class='btn btn-primary'>Meer informatie</a>
					</div>
				</div>";
			}
			?>
		</div>
	</div>
	</body>
</html>
