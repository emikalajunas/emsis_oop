<?php

//CLASS EVERYTIME classes starts from CAPITAL letter
class Comment extends Db_object { //lets use in Db_object class use User class methods

        //PROPERTIES from database to avoid ARRAYS and looping by Key

        protected static $db_table = "comments";
        protected static $db_table_fields = array('photo_id', 'author', 'body');
        public $id;
        public $photo_id;
        public $author;
        public $body;
    
    //METHOD
    public static function create_comment($photo_id, $author = "Default author", $body = "Default body"){
        
        if(!empty($photo_id) && !empty($author) && !empty($body)){
            $comment = new Comment(); //instatiatin class Comment
            
            $comment->photo_id  = (int)$photo_id; //assigning to properties, init checks that it would be INTEGER
            //$comment->photo_id  = $photo_id;
            $comment->author    = $author;
            $comment->body      = $body;
            
            return $comment;
        } else {            
            return false;            
        }
        
    }
    
    public static function find_the_comments($photo_id=0){
        
        global $database;
        
        $sql = "SELECT * FROM " .self::$db_table;
        $sql .= " WHERE photo_id = " . $database->escape_string($photo_id);
        $sql .= " ORDER BY photo_id ASC";
        
        
    return self::find_by_query($sql);
        
        
    }


} //END of Comment User





?>
