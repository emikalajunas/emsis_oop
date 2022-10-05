<?php

// setting class
class Cars{

//setting method (FUNCTION declared inside a class)
function greeting(){

}
function greeting2(){

}
}

//check if method (function) exists some where in Class Cars
$the_methods = get_class_methods('Cars');

//loop variable $the_methods to check what Methods Class Cars holds
foreach ($the_methods as $method){
echo $method . "<br>";
}



?>
