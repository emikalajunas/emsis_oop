<?php

class User extends Db_object
{

    protected static $db_table = "users";
    protected static $db_table_fields = array(
        'id',
        'username',
        'password',
        'first_name',
        'last_name',
        'user_email'
    );
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_email;
    public $upload_directory = "images";
    public $image_placeholder = "https://civilrights.msu.edu/_assets/images/placeholder/placeholder-200x200.jpg";
    public $upload_errors_array = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceed the max upload size",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceed the MAX FILE SIZE",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only patrially uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write fileto disk",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload",
    );

    public static function verify_user($username, $password)
    {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}'";
        $sql .= "AND password = '{$password}'";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_by_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

}

?>
