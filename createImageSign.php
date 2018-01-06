
<?php
//-----------------------------------------------
//|                                             |
//|           Coded by : Wannes Van Dorpe       |
//|                                             |
//-----------------------------------------------

//Create Image From Existing File
$jpg_image = imagecreatefromjpeg('HandtekeningBasis-BDB-2.jpg');
$color = imagecolorallocate($jpg_image, 6, 3, 69);
$font_name = 'TrajanPro-Bold.otf';
$font_job = 'TrajanPro-Regular.otf';
$startPlace = 15;

//get info to put on image
    $name = $_POST["name"];
    $job = $_POST["job"];
    $email = $_POST["email"];
    $gsm = $_POST["gsm"];

//put info on image
imagettftext($jpg_image, 23, 0, $startPlace, 75, $color, $font_name, $name);
imagettftext($jpg_image, 19, 0, $startPlace, 105, $color, $font_job, $job);
imagettftext($jpg_image, 15, 0, $startPlace, 155, $color, $font_job, $email);
//imagettftext($jpg_image, 15, 0, $startPlace, 230, $color, $font_job, $gsm);

//turn image into base64 encoding so we can send it to jquery
ob_start(); 
imagejpeg($jpg_image); //This will normally output the image, but because of ob_start(), it won't.
$contents = ob_get_contents(); 
ob_end_clean(); 

echo base64_encode($contents);

?>