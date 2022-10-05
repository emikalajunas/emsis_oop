<?php

//includes config file with Constants
require_once('config.php');

//CLASS EVERYTIME classes starts from CAPITAL letter
class Database {

        //making public PROPERTY
        public $connection;
        public $db;

    //METHOD __contstruct() for automatic start up $connection
    function __construct(){

        $this->db = $this->open_db_connection();

    }

    //METHOD
    public function open_db_connection(){

        //connection with SUDO keyword $this->
        //$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); <- old version

        //new version
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        //checks db if connection is OK
            if($this->connection-> connect_errno){
                die("Database connection was not succesfull" . $this->connection-> connect_error);
                } //else {echo 'connection with Database Class established';};
                return $this->connection;
    }

    //METHOD for automatic queries with $sql
    public function query($sql){

        //old version
        //$result = mysqli_query($this->connection, $sql);

        //new version
        $result = $this->db->query($sql);
        $this->confirm_query($result);

    return $result;

    }

    //METHOD to check if query is successful. If no die()
    private function confirm_query($result){
      if(!$result){
          die('Query failed' . $this->db->error);
        }
    }

    //METHOD to clean up DATA with real escape string
    public function escape_string($string){
    //old version
    //$escaped_string = mysqli_real_escape_string($this->connection, $string);

    //new version
    $escaped_string = $this->db->real_escape_string($string);
    return $escaped_string;
    }

    //METHOD gets last query autoincremented ID
    public function the_insert_id(){
        //return $this->connection->insert_id;
        return $this->db->insert_id;
    }

}

//instantiating class Database
$database = new Database();



?>
