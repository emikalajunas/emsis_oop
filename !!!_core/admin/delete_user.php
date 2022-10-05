<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()){redirect('login.php');} //FALSE -> STARTS THIS SCRIPT AND WORKS, TRUE PASSES ?>

<?php

//checks user if is not emty
if(empty($_GET['id'])){
    redirect('users.php');
}

$user = User::find_by_id($_GET['id']); //calling static method and finding user by id

if($user){
    $session->message('user deleted succesfully');
    
    $user->delete_photo();
    redirect('users.php');
} else {redirect('users.php');}

?>
