<?php

// setting class
class Cars{


    //defining a variable/PROPERTIE
    var $wheel_count = 4;
    var $door_count  = 4;

//setting method (FUNCTION declared inside a class)
function car_detail(){

                            //sudo variable
    return "This car has " . $this->wheel_count . " wheels";
}

}

//instiating Class Cars
$bmw = new Cars();
$mercedes = new Cars();

//accessing the Propertie-> no $dolar sign for propertie anymore
echo $bmw->wheel_count . "<br>";
echo $bmw->wheel_count = 10 . "<br>";
echo $mercedes->wheel_count;
echo $mercedes->car_detail();



?>
