
<?php
//-----------------------------------------------
//|                                             |
//|           Coded by : Wannes Van Dorpe       |
//|                                             |
//-----------------------------------------------

//get info to put on image
    $name = $_POST["name"];
    $job = $_POST["job"];
    $email = $_POST["email"];
    $gsm = $_POST["gsm"];
    
//first things first, log everything into a log file
include_once 'logger.php';
writelog($name,$job,$email,$gsm);
    
//Create Image From Existing File
$jpg_image = imagecreatefromjpeg('HandtekeningBasis-BDB-1.jpg');
$color = imagecolorallocate($jpg_image, 6, 3, 69);
$font_name = 'TrajanPro-Bold.otf';
$font_job = 'TrajanPro-Regular.otf';
$startPlaceRight = 768;

//get starting locations for right align
$name_place = $startPlaceRight - getWidth(19, $font_name, $name);
$job_place = $startPlaceRight - getWidth(17, $font_job, $job);
$email_place = $startPlaceRight - getWidth(15, $font_job, $email);
$gsm_place = $startPlaceRight - getWidth(15, $font_job, $gsm);

//put info on image
imagettftext($jpg_image, 19, 0, $name_place, 135, $color, $font_name, $name);
imagettftext($jpg_image, 17, 0, $job_place, 170, $color, $font_job, $job);
imagettftext($jpg_image, 15, 0, $email_place, 230, $color, $font_job, $email);
imagettftext($jpg_image, 15, 0, $gsm_place, 253, $color, $font_job, $gsm);

//turn image into base64 encoding so we can send it to jquery
ob_start(); 
imagejpeg($jpg_image); //This will normally output the image, but because of ob_start(), it won't.
$contents = ob_get_contents(); 
ob_end_clean(); 
echo base64_encode($contents);

//function to get the total lenght in px for the text
function getWidth($size, $font, $text) {
    $dimensions = imagettfbbox($size, 0, $font, $text);
    $textWidth = abs($dimensions[4] - $dimensions[0]);
    return $textWidth;
}

?>