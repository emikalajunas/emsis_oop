<?php
//DIRECTORY_SEPARATOR chooses by win or OS / \ separator autom
defined('DS') ? null : define ('DS', DIRECTORY_SEPARATOR); 

//REMOTE server
//define ('SITE_ROOT', DS . 'home'. DS . 'addparklt' . DS . 'domains' . DS . 'emsis.lt' . DS . 'public_html' . DS . 'OOP');

//LOCAL server
define ('SITE_ROOT', DS . 'wampn64' . DS . 'www' . DS . 'toshiba_files' . DS . 'emsis' . DS . '1.5');


//defines constant  INCLUDES_PATH_CLASSES to get path of classes
defined('INCLUDES_PATH_CLASSES') ? null : define ('INCLUDES_PATH_CLASSES', SITE_ROOT . DS . 'app' . DS . 'includes' . DS . 'classes');

//defines constant  INCLUDES_PATH_CLASSES to get path of classes
defined('INCLUDES_PATH') ? null : define ('INCLUDES_PATH', SITE_ROOT . DS . 'app' . DS . 'includes');

//connects classes and other files
require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."config.php");
require_once(INCLUDES_PATH_CLASSES.DS."database.php");
require_once(INCLUDES_PATH_CLASSES.DS."db_object.php");
require_once(INCLUDES_PATH_CLASSES.DS."session.php");
require_once(INCLUDES_PATH_CLASSES.DS."user.php");
require_once(INCLUDES_PATH_CLASSES.DS."records.php");
require_once(INCLUDES_PATH_CLASSES.DS."invoices.php");
require_once(INCLUDES_PATH_CLASSES.DS."clients.php");
?>
