<?php

// setting class
class Cars{


    //acess modifiers for properties
    static $wheel_count = 4.66; //can be used ANYWHERE
    static $door_count  = 4;// static property can be called without instiating Class


//setting STATIC method (FUNCTION declared inside a class)
static function car_detail(){

    //in STATIC methor (function) we do not need sudo $this anymore
    //here we use SELF not a class name to get static properties
    return self::$wheel_count;

}
}

//setting class Trucks that Extends (takes inside) class Cars
class Trucks extends Cars {

    //setting STATIC method (FUNCTION declared inside a class)
    static function display (){

        //keyword PARENT call static method car_detail from Class Cars
        echo parent:: car_detail();
   }
}

//calling method display
Trucks:: display();






?>
