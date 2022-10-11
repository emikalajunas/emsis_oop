<?php
//class autoloader function
function classAutoLoader($class){

    $class = strtolower($class);
    $the_path = "app/includes/classes/{$class}.php";

    if (is_file($the_path) && !class_exists($class)){
        include $the_path;
    }
    }

//function lets start more AUTOLOADER per 1 time. spl_autoload_register — Register given function as __autoload() implementation
spl_autoload_register('classAutoLoader');

//redirect function
function redirect($location) {
        header("Location: {$location}");
    }

//language function. Language is STORED in Session
function language(){    
    if(isset($_SESSION['lang'])){        
        include "languages/" .$_SESSION['lang']. ".php";        
    } else {        
       include "languages/en.php"; 
    }
}
?>
