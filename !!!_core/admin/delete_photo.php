<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()){redirect('login.php');} //FALSE -> STARTS THIS SCRIPT AND WORKS, TRUE PASSES ?>

<?php

//checks photo if is not emty
if(empty($_GET['id'])){
    redirect('photos.php');
}

$photo = Photo::find_by_id($_GET['id']); //calling static method and finding photo by id

if($photo){
    $photo->delete_photo();
    $session->message("The {$photo->filename} was deleted");
    redirect('photos.php');
} else {redirect('photos.php');}

?>
