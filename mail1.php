<?php 
session_start(); 

$GLOBALS['DEBUG_MODE'] = 1;
// CHANGE TO 0 TO TURN OFF DEBUG MODE
// IN DEBUG MODE, ONLY THE CAPTCHA CODE IS VALIDATED, AND NO EMAIL IS SENT
if($_SERVER['REQUEST_METHOD']==='POST'{
$name = htmlspecialchars(stripslashes(trim(strip_tags($_POST['name'])))));

$email = htmlspecialchars(stripslashes(trim(strip_tags($_POST['returnemail'])))));
$message = htmlspecialchars(stripslashes(trim(strip_tags($_POST['message'])))));
$formcontent="From: $name \n Message: $message";
$recipient = htmlspecialchars(stripslashes(trim(strip_tags($_POST['email'])))));
$subject = htmlspecialchars(stripslashes(trim(strip_tags($_POST['subject'])))));
$mailheader = "From: $email \r\n";

if($name && $email && $message && $subject && trim($_POST['captcha_code']){
include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
$securimage = new Securimage();

if ($securimage->check($_POST['captcha_code']) == false) {
$result="There was an error with the Captcha.";
}
else{
mail($recipient, $subject, $formcontent, $mailheader) or die('error');
$result="Thanks for contacting me! I'll be in touch!";}
}
else{
$result="There was a field left empty, please try again.";
}
}
?>