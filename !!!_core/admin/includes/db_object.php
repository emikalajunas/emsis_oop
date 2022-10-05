<?php

class Db_object {
    
    
    public $errors = array();
    public $upload_errors_array = array(
            UPLOAD_ERR_OK         => "There is no error", //0
            UPLOAD_ERR_INI_SIZE   => "The uploaded file exceed the max upload size", //1
            UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceed the MAX FILE SIZE", //2
            UPLOAD_ERR_PARTIAL    => "The uploaded file was only patrially uploaded", //3
            UPLOAD_ERR_NO_FILE    => "No file was uploaded", //4
            UPLOAD_ERR_NO_TMP_DIR => "Missing temporary folder", //6
            UPLOAD_ERR_CANT_WRITE => "Failed to write fileto disk", //7
            UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload",  //8
        );
    
     //METHOD this is passing $_FILES['uploaded_file'] as an argument $_FILES['uploaded_file'] = $file
    public function set_file($file){

        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = 'There was no file uploaded here';
            return false;

        } elseif ($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;

        } else {
            $this->user_image  = basename($file['name']);// == $_FILES['name'];
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];
        }

    }


    //METHOD
    public static function find_all(){ //ex find_all_users
        return static::find_by_query("SELECT * FROM " .  static::$db_table . " ");
    }

    //METHOD
    public static function find_by_id($id){ //ex find_user_by_id

        global $database; //to call query() method
        $the_result_array = static::find_by_query("SELECT * FROM " .  static::$db_table . " WHERE id=$id LIMIT 1"); //limit is better to set to avoid mess with overload loop

        //ternary sintax, bellow it works ok Too
        return !empty($the_result_array) ? array_shift($the_result_array) : false; //The array_shift() function removes the first element from an array, and returns the value of the removed element.

//        if(!empty($the_result_array)){
//
//            //removes the first element from an array, and returns the value of the removed element.
//            $first_item = array_shift($the_result_array);
//
//            return $first_item;
//        } else {
//            return false;
    }

    //METHOD
    public static function find_by_query($sql){
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array(); //sets an empty array

        while($row = mysqli_fetch_array($result_set)){
         $the_object_array[] =  static::instantiation($row);
        }
        return $the_object_array;
    }

    //METHOD
    public static function instantiation($the_record){

        $calling_class = get_called_class();

        //instantiating a Class User
        $the_object = new $calling_class;

        //$the_object->id         = $found_user['id'];
        //$the_object->username   = $found_user['username'];
        //$the_object->password   = $found_user['password'];
        //$the_object->first_name = $found_user['first_name'];
        //$the_object->last_name  = $found_user['last_name'];

        foreach($the_record as $the_attribute => $value){

        //checks if $the_object not empty array, so instantiates the key and value
        if($the_object->has_the_attribute($the_attribute)){

            //IF $the_object was empty, we set up it with VALUES
            $the_object->$the_attribute = $value;
        }
        }

        return $the_object;
    }


     //METHOD private<- cannot be used outside the class
    private function has_the_attribute($the_attribute){

        //using $this sudo variable to check all the User class array
        $object_properties = get_object_vars($this);

        //checking if the key exists $object_properties array. Returns true/false
        return array_key_exists($the_attribute, $object_properties);

    }

    //METHOD to set properties to array
    protected function properties () {

        //return get_object_vars($this); //get_object_vars gets ALL propierties of object but all we dont need :)

        $properties = array();

        foreach (static::$db_table_fields as $db_field){      //static->for static propertie

            if(property_exists($this, $db_field)){

                $properties[$db_field] = $this->$db_field; //??
            }
        }
            return $properties;
    }

    //METHOD
    protected function clean_properties(){
        global $database;

        $clean_properties = array();
        foreach ($this->properties() as $key => $value){
            $clean_properties[$key]=$database->escape_string($value);
        }

        return $clean_properties;

    }

    //METHOD
    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }

    //METHOD create user
    public function create(){
        global $database;

        $properties = $this->clean_properties();//holds all properties

        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")"; //implode — Join array elements with a string The array_keys() function returns an array containing the keys.
        $sql .= "VALUES ('". implode("','", array_values($properties)) . "')";

        if($database->query($sql)){

            $this->id = $database->the_insert_id();
            return true;

        } else {

            return false;
        }

    }

    //METHOS update user
    public function update(){

        global $database;

        $properties = $this->clean_properties();

        $properties_pairs = array();

        foreach($properties as $key => $value){

            $properties_pairs[] = "{$key}='{$value}' ";

        }

        $sql  = "UPDATE " .static::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    }

    //METHOD delete user
    public function delete(){
        global $database;
        $sql  = "DELETE FROM " . static::$db_table . " ";
        $sql .= "WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }
    
    //METHOD counts all (photos, visitos etc)
    public static function count_all(){
        
        global $database;
        
        $sql = "SELECT COUNT(*) FROM " . static::$db_table;
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);
        return array_shift($row);
    }
    
}



?>
