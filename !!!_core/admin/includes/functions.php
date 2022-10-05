<?php
        function classAutoLoader($class){

            $class = strtolower($class);
            $the_path = "admin/includes/{$class}.php";

            if (is_file($the_path) && !class_exists($class)){
                include $the_path;
            }
            }

//function lets start more AUTOLOADER per 1 time
spl_autoload_register('classAutoLoader');

        function redirect($location) {
            header("Location: {$location}");
        }

?>
