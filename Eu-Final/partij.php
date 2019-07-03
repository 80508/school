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
			$SelectedParty = $_GET["Party"];
			$PartyData = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM EU_PARTIES WHERE ID=".$SelectedParty));
			$PartyPicture;
			if (empty($SelectedParty) || mysqli_error($mysqli) || count($PartyData) == 0) {
				Header("Location: index.php");
			}
			foreach (glob("Resources/PartyPosters/".$SelectedParty.".*") as&$filepath) {
				$PartyPicture = $filepath;
				break;
			}
			if (empty($PartyPicture)) {
				$PartyPicture = "Resources/Images/GLR.jpg";
			}
			
			function getYoutubeEmbedUrl($url)
			{
				$shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
				$longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

				if (preg_match($longUrlRegex, $url, $matches)) {
					$youtube_id = $matches[count($matches) - 1];
				}

				if (preg_match($shortUrlRegex, $url, $matches)) {
					$youtube_id = $matches[count($matches) - 1];
				}
				return 'https://www.youtube.com/embed/' . $youtube_id ;
			}
		?>
 		<div class="container">
			<div class="card-body">
				<picture>
					<source srcset="<?php echo $PartyPicture; ?>" type="image">
					<img src="<?php echo $PartyPicture; ?>"" class="img-fluid img-thumbnail" alt="...">
				</picture>
			</div>

			<div class="card-body">
				<h5 class="card-title"><?php echo $PartyData["Name"]; ?></h5>
				<p class="card-text"><?php echo $PartyData["Description"]; ?></p>
			</div>
			<?php
				if (!empty($PartyData["Video_URL"]) && $PartyData["Video_URL"] != "Placeholder") {
					echo '<div class="card-body">
						<iframe width="600" height="350" src="'.getYoutubeEmbedUrl($PartyData['Video_URL']).'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>';
				}
			?>
			<a href='stemmen.php' class='btn btn-primary'>Stem nu!</a>
		</div>
	</body>
</html>
