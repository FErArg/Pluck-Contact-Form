<?php
/*
 * This file is part of pluck, the easy content management system
 * Copyright (c) somp (www.somp.nl)
 * http://www.pluck-cms.org
 * Pluck is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * See docs/COPYING for the complete license.


// SerInformaticos modify it to control the email address be real
//Website: http://www.serinformaticos.es

*/

//Make sure the file isn't accessed directly.
defined('IN_PLUCK') or exit('Access denied!');

//First get the recipient emailaddress
include("data/settings/options.php");
//Then include Translation data
include("data/settings/langpref.php");
include("data/inc/lang/en.php");
include("data/inc/lang/$langpref");
//Define some variables
$name = $_POST['name'];
$sender = $_POST['sender'];
$message = $_POST['message'];

//Then show the contactform
echo "<form method=\"post\" action=\"\" style=\"margin-top: 15px; margin-bottom: 15px;\"><div>
$lang_contact3 <br /><input name=\"name\" type=\"text\" value=\"\" /><br />
$lang_contact4 <br /><input name=\"sender\" type=\"text\" value=\"\" /><br />
$lang_contact5 <br /><textarea name=\"message\" rows=\"7\" cols=\"45\"></textarea><br />
<input type=\"submit\" name=\"Submit\" value=\"$lang_contact10\" />
</div></form>";

//If the the contactform was submitted
if(isset($_POST['Submit'])) {
	//Check if all fields were filled
	if (($name) && ($sender) && ($message)) {
		//Check for spam
		if (strpos($name, "\r") || strpos($name, "\n")) {
			die("no spam please!");
		}
		// check if a real email
		if (eregi (".+@+.+\..{1,3}", $sender)) {
			} else{
				die("Email error!");
		}
	if (strpos($sender, "\r") || strpos($sender, "\n")) {
		die("no spam please!");
	}
	//Check for wrong characters and delete them
	$name = htmlspecialchars($name);
	$sender = htmlspecialchars($sender);
	$message = htmlspecialchars($message);
	$name = stripslashes($name);
	$sender = stripslashes($sender);
	$message = stripslashes($message);
	//Change enters in their html-equivalents
	$message = str_replace ("\n","<br>", $message);
	
	//Now we're going to send our email
	$subject = "$lang_contact7 $name";
	
	if (mail($email,$subject,"<html><body>$message</body></html>","From: $sender \n" . "Content-type: text/html; charset=utf-8")){
		echo "$lang_contact8"; }
		//If email couldn't be send
	else {
		echo "$lang_contact9"; }
}
	//If not all fields were filled
else {
	echo "<span style=\"color: red;\">$lang_contact6</span>"; }
}
?>
