<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()){redirect('login.php');} //FALSE -> STARTS THIS SCRIPT AND WORKS, TRUE PASSES ?>

<?php

//checks user if is not emty
if(empty($_GET['id'])){
    redirect('comments.php');
}

$comment = Comment::find_by_id($_GET['id']); //calling static method and finding user by id

if($comment){
    $comment->delete();
    $session->message("The comment with {$comment->id} was deleted");
    redirect("comment_photo.php?id={$comment->photo_id}");
} else {
    redirect("comment_photo.php?id={$comment->photo_id}");
}

?>
