<?php

// setting class
class Cars{

//assigning properties
var $wheels = 4;


//setting method (FUNCTION declared inside a class)
function greeting(){
    return "Hello greeting method Cars class";
}
}

//instantiate class
$bmw = new Cars();


//empty class that EXTENDS Cars Class
class Trucks extends Cars{

}

//truck Takoma

$takome = new Trucks ();

echo $takome->wheels . "<br>";
echo $takome->greeting();


?>
