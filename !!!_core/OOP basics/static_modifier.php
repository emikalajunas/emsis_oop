<?php

// setting class
class Cars{


    //acess modifiers for properties
    static $wheel_count = 4; //can be used ANYWHERE
    static $door_count  = 4;// static property can be called without instiating Class


//setting STATIC method (FUNCTION declared inside a class)
static function car_detail(){

    //in STATIC methor (function) we do not need sudo $this anymore
    echo Cars::$wheel_count;

}

}

//instiating Class Cars
$bmw = new Cars();

//accesing public property
//echo $bmw -> wheel_count . "<br>";

//accesing STATIC property with '::' and $var for this we DONT need instance operation '$bmw = new Cars();'
//echo Cars::$door_count;

//accessing STATIC Method car_detail
Cars::car_detail();


?>
