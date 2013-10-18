<?php
 header('Content-type: image/gif');
//imagejpeg(imagecreatefromjpeg('image.jpg',10));
$urlsource=$_GET['urlsource'];
$urldestyni=$_GET['urldestyni'];
$urlerror=$_GET['urlerror'];
$width=$_GET['width'];
$height=$_GET['height'];
$quality = $_GET['quality'];
function thumbnail_gif ($original, $thumbnail, $width, $height, $quality) {
  list($width_orig, $height_orig) = getimagesize($original);
  if ($width && ($width_orig < $height_orig)) {
    $width = ($height / $height_orig) * $width_orig;
  }
        else {
    $height = ($width / $width_orig) * $height_orig;
  }
  $image_p = imagecreatetruecolor($width, $height);
  $image = imagecreatefromgif($original);
  imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
  imagegif($image_p, $thumbnail, $quality);
  return;
}
//thumbnail_jpeg('image.jpg','pequenia.jpg',40,40,50);
//

//imagejpeg(imagecreatefromjpeg($urldestyni));
if(!file_exists($urldestyni)){
	if(file_exists($urlsource)){
		thumbnail_gif($urlsource,$urldestyni,$width,$height,$quality);
		echo imagegif(imagecreatefromgif($urldestyni));
	}
	else{
		echo imagegif(imagecreatefromgif($urlerror));
	}
}
else
{	//2001-SINT-BUCK-CH-MAYA-MAQUILLAJE-NARANJA.gif
	echo imagegif(imagecreatefromgif($urldestyni));
}

?>