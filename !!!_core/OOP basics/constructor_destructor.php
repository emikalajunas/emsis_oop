<?php

// setting class
class Cars{


    //properties
    public $wheel_count = 4.66; //can be used ANYWHERE
    static $door_count = 4;


//setting method __contruct ant this ECHOES automaticly
function __construct(){

    echo $this->wheel_count . "<br>";
    echo self:: $door_count . "<br>";
    echo self:: $door_count++; //here we increment STATIC propertie 
}
    
//setting method __destruct ant this ECHOES automaticly
function __destruct(){

    echo $this->wheel_count . "<br>";
    echo self:: $door_count . "<br>";
    echo self:: $door_count--; //here we increment STATIC propertie 
}    
}

//EVERYTIME when we instantiating CLASS Cars (to variable $bmw) __contruct STARTS automaticly AND echoes 
$bmw = new Cars;
$mercedes = new Cars;
$mercedes2 = new Cars;



?>
