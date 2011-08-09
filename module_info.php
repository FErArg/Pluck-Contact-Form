<?php
//This is a module for pluck, an opensource content management system
//Website: http://www.pluck-cms.org

//MODULE NAME: contact form
//DESCRIPTION: use this module to display a contactform for your visitors
//LICENSE: GPLv3
//This module is included with pluck

// SerInformaticos modify it to control the email address be real
//Website: http://www.serinformaticos.es

//Make sure the file isn't accessed directly.
defined('IN_PLUCK') or exit('Access denied!');

//Include language-items
include ("data/settings/langpref.php");
include ("data/inc/lang/en.php");
include ("data/inc/lang/$langpref");

//Module name
$module_name = "$lang_contact12 - v2";

//Short module introduction
$module_intro = $lang_contact13;

//Module dir
$module_dir = "contactform2";

//Filename of the module-icon
$module_icon = "images/contactform.png";

//Version of the module
$module_version = "0.1";

//Author of the module
$module_author = "pluck development team + SerInformaticos.es";

//Website of the module
$module_website = "http://www.pluck-cms.org";

//Compatibility
$module_compatibility = "4.6";

?>
