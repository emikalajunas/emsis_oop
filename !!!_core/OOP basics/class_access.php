<?php

// setting class
class Cars{


    //acess modifiers for properties
    public $wheel_count = 4; //can be used ANYWHERE
    private $door_count  = 4;// can be available only for class Cars
    protected $seat_count = 4;// available only in this Class and her inheretance classes

//setting method (FUNCTION declared inside a class)
function car_detail(){

    echo $this->wheel_count;
    echo $this->door_count;
    echo $this->seat_count;

}

}

//instiating Class Cars
$bmw = new Cars();

//checking what works what are protected or private OUTSIDE class Cars
//echo $bmw->wheel_count;//works
//echo $bmw->door_count;//error :)
//echo $bmw->seat_count;//error :)

//check what works INSIDE class Cars
echo $bmw -> car_detail();


?>
