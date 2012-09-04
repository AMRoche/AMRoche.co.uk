<?php 
session_start(); 
?>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php'; 
$securimage = new Securimage();

if($_SERVER['REQUEST_METHOD']==POST){

$name = trim($_POST['nameOfSender']);
$email = trim($_POST['returnemail']);
$message = trim($_POST['message']);
$recipient = $_POST['email'];
$subject = trim($_POST['subject']);

if ($securimage->check($_POST['captcha_code']) == false) {
  // the code was incorrect
  // you should handle the error so that the form processor doesn't continue
  // or you can use the following code if there is no validation or you do not know how
  echo "The security code entered was incorrect.<br /><br />";
  echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
  exit;
}
else if(strlen($email) != 0 && !preg_match('/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i', $email) && strlen($name) > 1){
$message = "A message was submitted from the contact form.  The following information was provided.<br /><br />"
                    . "Name: $name<br />"
                    . "Email: $email<br />"
                    . "Message:<br />"
                    . "<pre>$message</pre>"
                    . "<br /><br />IP Address: {$_SERVER['REMOTE_ADDR']}<br />"
                    . "Browser: {$_SERVER['HTTP_USER_AGENT']}<br />";
					  $message = wordwrap($message, 70);
					  echo($message);
mail($recipient,$subject,$message);

}
else{
 echo "Something's gone really wrong with how you submitted the form...<br /><br />";
  echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
  exit;
}
}

?>


<!DOCTYPE = HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css.css" />
<title>Getting in touch with me.
</title>
</head>
<body>
<div id = "container">
<div id ="header">
<a href="index.html"><img src="citySkyline1.jpg" alt="top banner" width="600px"></a>
</div>

<div id = "mainMenu">
<ul>
<li> <a href ="index.html">Home</a>
<li> <a href ="aboutMe.html">About Me</a>
<li> <a href ="qualifications.html">Qualifications</a>
<li> <a href ="projects.html">Projects</a>
<li> <a href ="contactMe.html">Contact me</a>
</ul>
</div>

<div id="mainBlock">


<div id="left">

<h1>Contacting Me</h1>
<p>If you have any queries or comments regarding this site, or would like to contact me 
regarding possibly working for you, please feel free to get in touch with me in any of 
the following ways.</p>
<table width="100%">
<tbody>
<tr class="bumperBody">
<td>Email Addresses:</td>
<td align="right">alex@amroche.co.uk</td>
</tr>
<tr>
<td></td>
<td align="right">ma901ar@gold.ac.uk</td>
</tr>
<tr>
<td></td>
<td align="right">alexandermichaelroche@gmail.com</td>
</tr>
<tr class="bumperBody">
<td>Twitter:</td>
<td align="right">@Zenmaster13</td>
</tr>
<tr class="bumperBottom">
<td>Facebook:</td>
<td align="right">/alexander.michael.roche</td>
</tr>
</tbody>
</table>

<p> Additionally, you can also contact me by filling out this form if you have any inquiries, 
comments or suggestions. I will do my utmost best to get back 
to you with ideas and suggestions for a solution to your problem. </p>

<form method="POST">
<table width="100%">
<tbody>
<tr class="bumperbody">
<td>Email to send to;</td>
<td align="right">Professional Inquiries<INPUT type ="radio" name="email" value="alex@amroche.co.uk" checked></td>
</tr>
<tr>
<td></td><td align="right">University Email<INPUT type ="radio" name="email" value="ma901ar@gold.ac.uk"></td>
</tr>
<tr>
<td></td><td align="right">Googlemail<INPUT type ="radio" name="email" value="alexandermichaelroche@googlemail.com"></td>
</tr>
<tr class="bumperbody">
<td>Name:<br></td> 
<td align="right"><INPUT type="text" name="nameOfSender"></td>
</tr>
<tr class="bumperbody">
<td>Return Address:<br></td>
 <td align="right"><INPUT type="text" name="returnemail"/></td>
</tr>
<tr class="bumperbody">
<td>Subject:<br></td> <td align="right"><INPUT type="text" name="subject"/> </td>
</tr>
<tr class ="bumperbody">
<td colspan ="2">Message: <textarea name="message" rows="6" cols="42"></textarea></td>
</tr>
<tr class ="bumperbody">
<td><img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" width="82% height="82%"/></td>
<td align="right">
<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a><br>
<input type="text" name="captcha_code" size="10" maxlength="6" /> <br>
</td>
<tr class ="bumperbottom">
<td colspan="2"><center><input type="submit" value="Send Message"></center></td>
</tr>
</tbody>
</table>
</form>

</div>

<div id="right">
<h1>About contacting me</h1>
<p>Thank you for trying to get in touch with me! I'm really sorry if I don't get back to you quickly, 
it's likely i've not checked my e-mail yet, or just outright not seen your email, or your email has 
ended up in my spam folder, for whatever reason!</p>
<p>It's also equally as likely that something has gone terribly wrong with the mailing script, so if you 
suspect your message hasn't sent, feel free to try again!</p>
</div>
</div>


</div>

</body>
<footer>
<span id="r">ALEX@AMROCHE.CO.UK </span>
<span id ="l">ALEXANDER MICHAEL ROCHE</span>

</footer>
</html>
