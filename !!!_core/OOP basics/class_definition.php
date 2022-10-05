<?php

// setting class
class Cars{

}

//checking what classes are declared and setting all them to $my_classes variable
$my_classes = get_declared_classes();


//ussing loop to check what classes are set in $my_classes variable
foreach ($my_classes as $class){
    echo $class . "<br>";
}


?>
