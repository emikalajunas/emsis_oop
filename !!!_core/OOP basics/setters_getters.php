<?php

// setting class
class Cars{


    //acess modifiers for properties
    private $door_count  = 4;// can be available only for class Cars


//setting method (FUNCTION declared inside a class)
function get_values(){

    echo $this->door_count;

}

function set_values(){

    $this->door_count= 10;

}

}

//instiating Class Cars
$bmw = new Cars();

$bmw -> set_values();

$bmw -> get_values();


?>
