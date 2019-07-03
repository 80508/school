<?php
require_once 'session.inc.php';
require_once 'config.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set("display_errors", 1);



// in volgorde foto uploaden dan de rest ophalen daarna de functie: wat was het id van de als laats geuploadde foto.


//alle data is OK, maak de query
$query2 = "SELECT * FROM Beroeps4_catogorie";

// voer de query uit
$result2 = mysqli_query($mysqli, $query2);

$option = "";
if ($result2) {
while ($row = mysqli_fetch_array($result2)) {
    // code...
    $option .= "<option value=".$row['id'].">".$row['Naam']."</option>";
}
} else {
echo "<center>Er ging iets mis tijdens het toevoegen </center>";
echo mysqli_error($mysqli);
}



function image_fix_orientation($filename)
{

    $exif = exif_read_data($filename);
    $image = imagecreatefromjpeg($filename);


    if (!empty($exif['Orientation']))
    {
        switch ($exif['Orientation']) {
            case 3:
                $image = imagerotate($image, 180, 0);
                break;

            case 6:
                $image = imagerotate($image, -90, 0);
                break;

            case 8:
                $image = imagerotate($image, 90, 0);
                break;
        }

        imagejpeg($image, $filename, 90);
    }

  }

  function thumbnail($filename,$thumb,$thumbwidth, $quality = 600)

  {

  $image = imagecreatefromjpeg($filename);

  $info = @getimagesize($filename);


     $width = $info[0];

     $w2=ImageSx($image);
     $h2=ImageSy($image);
     $w1 = ($thumbwidth <= $info[0]) ? $thumbwidth : $info[0]  ;

     $h1=floor($h2*($w1/$w2));
     $im2 =imagecreatetruecolor($w1,$h1);

     imagecopyresampled ($im2,$image,0,0,0,0,$w1,$h1,$w2,$h2);
     $path=addslashes($thumb);
     ImageJPEG($im2,$path,$quality);
     ImageDestroy($image);
     ImageDestroy($im2);
}


// word utgevoerd wanneer er op de upload knop word geklikt
if(isset($_POST['submit']))
{

    //fotoupload
	for ($i=0; $i<count($_FILES["file_img"]["name"]); $i++)
	{
        $newtime = time();
	    $filetmp = $_FILES["file_img"]["tmp_name"][$i];
        $filename = $_FILES["file_img"]["name"][$i];
        $filetype = $_FILES["file_img"]["type"][$i];
        $filepath = "images/".$newtime . $filename . basename($_FILES["file_img"]["name"][0]);
        $thumbpath = "images/thumb/".$newtime . $filename . basename($_FILES["file_img"]["name"][0]);
        $allowed = array("image/jpeg", "image/jpg", "image/png");

        if(!in_array($filetype, $allowed)) {
        $error_message = "<div <span style='width:300px; 'class='alert alert-danger'><strong>U mag alleen jpeg en png bestanden uploaden</strong></div>";
              $error = true;
        }

  else{
    move_uploaded_file($filetmp,$filepath);
		// functie aanroepen om rotatie te voorkomen
		image_fix_orientation($filepath,$filename);
    // functie aanroepen om een thumbnail the maken
    thumbnail($filepath,$thumbpath,600,$quality = 600);




    // de foto's inserten in de database
 $sql = "INSERT INTO Beroeps4_images (img_name,img_path,thumb_path,img_type) VALUES ('$filename','$filepath','$thumbpath','$filetype')";
echo "$query";
  $result = mysqli_query($mysqli, $sql);
 $img_id = mysqli_insert_id($mysqli);
	      }
     }

$catogorie_id = $_POST['catogorie_id'];
$prijs = $_POST['prijs'];
$naam = $_POST['naam'];

var_dump ($_POST);
//var_dump($img_id);
var_dump ($catogorie_id);
var_dump ($prijs);
var_dump ($naam);

     // controle formuliervelden
     if (strlen($catogorie_id)  	> 0 &&
         strlen($img_id)			> 0 &&
         strlen($prijs)  			> 0 &&
     	 strlen($naam)		      	> 0 ) {



     		//alle data is OK, maak de query
     		$query3 = "INSERT INTO Beroeps4_schoen
     			(catogorie_id, img_id,naam,prijs)  VALUES ($catogorie_id, $img_id, $prijs, '$naam')";

     	// voer de query uit
     	$result3 = mysqli_query($mysqli, $query3);

     	if ($result3) {

     		header("Location:items.php");
     		exit;
     	} else {
     		echo "<center>Er ging iets mis tijdens het toevoegen </center>";
     		echo mysqli_error($mysqli);
     	}

     }
     else {
     	echo 'Niet alle velden waren ingevuld!';
        echo mysqli_error($mysqli);
     }
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
	<title></title>
</head>
<body>
<center>
<h1> Schoenen </h1>


<form class="form-container" action="" method="post" enctype="multipart/form-data">
<h2>Schoenenwinkel</h2>
<br>
	<!-- formulier om de inlog gegevens in te voeren -->

    <select class="catogorie" name="catogorie_id">
        <?php
        echo $option;
        ?>
        </select>

<input type="file" name="file_img[]" />


<input type="text" name="naam" id="naam">
€
<input type="number" name="prijs" id="prijs">


<br><br>
	<!-- knop om de gegevens op te sturen -->
	<input class="btn btn-success" type="submit" name="submit" id="submit" value="submit">
	&nbsp;&nbsp;
	<button class="btn btn-danger" onclick="history.back();return false;">Annuleren</button>
 </div>
</form>



</center>

</body>
</html>
