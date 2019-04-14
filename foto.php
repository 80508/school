<?php
require_once 'session.inc.php';
require_once 'config.inc.php';
require 'config.php';

ini_set("display_errors", 1);
// zet alle foutmeldingen aan


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
var_dump ($_FILES);
// word utgevoerd wanneer er op de upload knop word geklikt
if(isset($_POST['btn_upload']))
{
	for ($i=0; $i<count($_FILES["file_img"]["name"]); $i++)
	{
        $newtime = time();
	    $filetmp = $_FILES["file_img"]["tmp_name"][$i];
        $filename = $_FILES["file_img"]["name"][$i];
        $filetype = $_FILES["file_img"]["type"][$i];
        $filepath = "images/".$newtime . $filename . basename($_FILES["file_img"]["name"][0]);
        $thumbpath = "images/thumb/".$newtime . $filename . basename($_FILES["file_img"]["name"][0]);
        $event_id = $_POST['event_id'];
        $allowed = array("image/jpeg", "image/jpg");

        if(!in_array($filetype, $allowed)) {
        $error_message = "<div <span style='width:300px; 'class='alert alert-danger'>
<strong>U mag alleen jpeg / jpg bestanden uploaden</strong>
</div>";
              $error = true;
        }

  else{
    move_uploaded_file($filetmp,$filepath);
		// functie aanroepen om rotatie te voorkomen
		image_fix_orientation($filepath,$filename);
    // functie aanroepen om een thumbnail the maken
    thumbnail($filepath,$thumbpath,600,$quality = 600);

    // de foto's inserten in de database
 $sql = "INSERT INTO beroep3_images (img_name,img_path,thumb_path,img_type,event_id) VALUES ('$filename','$filepath','$thumbpath','$filetype','$event_id')";
echo "$query";
  $result = mysqli_query($mysqli, $sql);
		if ($result) {
            echo "$query";
		// terug sturen naar de homepage
		header("Location:homesucces.php");
          }

	      }

     }
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<center>
  <?php include('logo.php'); ?>
<?php include('nav.php'); ?>
</center>
<center>
<br>
<br>
<h1>Foto Uploaden</h1>
<br>
</center>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<center>
<form action="foto.php" method="post" enctype="multipart/form-data">
<!-- id van het event meesturen -->
<input type="hidden" name="event_id" value="<?= $_GET['event_id'] ?>">
<input type="file" name="file_img[]" multiple />
<br>
<br>
<?php
echo $error_message;
?>
<br>
<!--  uploadknop-->
<input type="submit" class="btn btn-success" name="btn_upload" value="Upload">
<br>
<br>
<br>
<br>
</form>
	</center>



</body>
</html>
