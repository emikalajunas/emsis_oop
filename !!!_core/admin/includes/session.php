<?php

//Class name
class Session {

        //Property of Class Session
        private $signed_in = false;
        public  $user_id;
        public $message;
        public $count;


    //METHOD __construct() function, PHP will automatically call this function when you create an object from a class.
    function __construct(){
        session_start();

        //call check_the_login() automaticly when application starts
        $this->check_the_login();
        $this->check_message();
        $this->visitor_count();       
        
    }
    
    //message
    public function message($msg=" "){
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }        
    }
    
    //checks is message in SESSION stores or not (used in edit_user.php for update user redirect())
    private function check_message(){
        if(isset($_SESSION['message'])){
           $this->message = $_SESSION['message'];
           unset($_SESSION['message']);
        } else {
            $this->message =" ";
        

        }
    }
    
    
    //METHOD
    public function visitor_count(){
        if(isset($_SESSION['count'])){
            return $this->count = $_SESSION['count']++;            
        }  else {
            return $_SESSION['count'] = 1;
        }
    } 

    //METHOD it`s GETTER! that we can  call EVERYWHERE and it gets PRIVATE value $signed_in. Thats why we need getter
    public function is_signed_in(){

       return $this->signed_in;

    }

    //METHOD which checks if $user logged in. $user comes from Database Class????
    public function login($user){

        //if user is logged in
        if($user){                                  //from User class sets id

            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }

    }

    //METHOD
    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }

    //METHOD
    private function check_the_login(){
       if(isset($_SESSION['user_id'])){

        $this->user_id = $_SESSION['user_id'];
        $this->signed_in = true;

       } else {

       //The unset() function unsets a variable.
       unset($this->user_id);
       $this->signed_in = false;

       }
    }
}

//instantiating a Class Session with variable $session that holds all objects
$session = new Session();
$message = $session->message();


?>
