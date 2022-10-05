<?php

//CLASS EVERYTIME classes starts from CAPITAL letter
class User extends Db_object { //lets use in Db_object class use User class methods

        //PROPERTIES from database to avoid ARRAYS and looping by Key

        protected static $db_table = "users";
        protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');
        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;
        public $user_image;
        public $upload_directory = "images";
        public $image_placeholder = "https://civilrights.msu.edu/_assets/images/placeholder/placeholder-200x200.jpg";
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
    
    //AJAX Method
    public function ajax_save_user_image($user_image, $user_id){
        
        global $database;
        
        $user_image  = $database->escape_string($user_image);
        $user_id     = $database->escape_string($user_id);
        
        $this->user_image = $user_image;
        $this->id         = $user_id;
        
        $sql  = "UPDATE " . self::$db_table . " SET user_image ='{$this->user_image}' ";
        $sql .= " WHERE id = {$this->id}";
        $update_image = $database->query($sql);
        
        echo $this->image_path_and_placeholder();
        
//        $this->user_image = $user_image;
//        $this->id = $user_id;
//        $this->save();
        
    }


    //METHOD
    public function upload_photo(){
       
            if(!empty($this->errors)){
                return false;
            }

            if(empty($this->user_image) || empty($this->tmp_path)){
                $this->errors[] = "the file was not found";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

            if(file_exists($target_path)){
                $this->errors[] = "The file {$this->user_image} already exists";
                return false;
            }

            if(move_uploaded_file($this->tmp_path, $target_path)){ //moves file from TEMP to PERM

                
                    unset ($this->tmp_path);
                    return true;
                

            } else {
                $this->error[]= "The file directory was not probably does not have permission";
                return false;
            }
        }
    


    //METHOD
    public function image_path_and_placeholder(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
    }


    //METHOD
    public static function verify_user($username, $password){
        global $database;

        //clean up (SANITIZE) DATA from input form
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " .  self::$db_table . " WHERE ";
        $sql .= "username = '{$username}'";
        $sql .= "AND password = '{$password}'";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_by_query($sql);

        //ternary sintax, bellow it works ok Too
        return !empty($the_result_array) ? array_shift($the_result_array) : false;


    }
    
     //METHOD
    public function delete_photo(){
        if($this->delete()){ //this part deletes DATA from db

            //this part deletes FILE from permanent dir
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image; //OR BELLOW
            //$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename; GETS FILE path

            //The unlink() function deletes a file.
            return  unlink($target_path) ? true : false;

        } else {
            return false;
        }

    }
    
    //Method finds users added photos
    public function photos(){
        
        return Photo::find_by_query("SELECT * FROM photos WHERE user_id= " .  $this->id);
        
    }


} //END of Class User





?>
