<?php
defined('DS') ? null : define ('DS', DIRECTORY_SEPARATOR); //DIRECTORY_SEPARATOR chooses by win or OS / \ separator autom

//C:\wampn64\www\udemyb3_PHP_OOP <- work Acer pc
define ('SITE_ROOT', DS . 'wampn64' . DS . 'www' . DS . 'OOP');

//C:\xampp <- home Toshiba pc
//define ('SITE_ROOT', DS . 'xampp' . DS . 'htdocs' . DS . 'OOP');

defined('INCLUDES_PATH') ? null : define ('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');

//require_once('functions.php');
//require_once('config.php');
//require_once('database.php'); //Database Class
//require_once('db_object.php'); //Database Class
//require_once('user.php');//User Class
//require_once('photo.php');//Photo Class
//require_once('session.php');//SESSION Class
//require_once('comment.php');//Comment Class

require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."config.php");
require_once(INCLUDES_PATH.DS."database.php");
require_once(INCLUDES_PATH.DS."db_object.php");
require_once(INCLUDES_PATH.DS."user.php");
require_once(INCLUDES_PATH.DS."photo.php");
require_once(INCLUDES_PATH.DS."comment.php");
require_once(INCLUDES_PATH.DS."session.php");
require_once(INCLUDES_PATH.DS."paginate.php");

?>
