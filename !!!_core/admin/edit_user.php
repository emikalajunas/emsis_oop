<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>
<?php //include("includes/init.php"); <- includes allready in header?>

<?php if(!$session->is_signed_in()){redirect('login.php');} //FALSE -> STARTS THIS SCRIPT AND WORKS, TRUE PASSES ?>

<?php

    if(empty($_GET['id'])){
    redirect('users.php');
    }

        $user = User::find_by_id($_GET['id']);// calling stating method

    if(isset($_POST['update'])){

      if($user){
         $user->username   =          $_POST['username']; //assigning to properties
         $user->first_name =          $_POST['first_name'];
         $user->last_name  =          $_POST['last_name'];
         $user->password   =          $_POST['password'];
          
          if(empty($_FILES['user_image'])){
              
              $user->save();
              redirect("users.php");
              $session->message("The user has been updated");
              
          } else {
              $user->set_file($_FILES['user_image']);
              $user->upload_photo();
              $user->save();
              $session->message("The user has been updated");
              
              //redirect("edit_user.php?id={$user->id}");
                redirect("users.php");
          } 
      }
    }
    //my version of delete user (html commented too)
    if(isset($_POST['delete'])){
        $user->delete($user->id);
        redirect("users.php");
    }
?>
   

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <!-- Brand and toggle get grouped for better mobile display -->
           <?php include 'includes/top_nav.php'  ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include 'includes/side_nav.php'  ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

           <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            users
                        </h1>
                       <div class="col-md-6 user_image_box">
                           
                             <a href="#" data-toggle="modal" data-target="#photo-library"><img class="img-responsive" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="" class="src"></a>
                            
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                       <div class="col-md-6">
                           <div class="form-group">
                              <input type="file" name="user_image">
                          </div>
                          <div class="form-group">
                           <label for="username">Username</label>
                              <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                          </div>
                           <div class="form-group">
                           <label for="lastname">Firstname</label>
                              <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
                          </div>
                          <div class="form-group">
                           <label for="lastname">Lastname</label>
                              <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                          </div>
                           <div class="form-group">
                           <label for="password">Password</label>
                              <input type="text" name="password" class="form-control" value="<?php echo $user->password;?>">
                          </div>
                          
                          <div class="form-group">
<!--                              <input type="submit" name="delete" class="btn btn-danger pull-left" value="Delete" >-->
                             
                              <a id="user-id" href="delete_user.php?id=<?php echo $user->id;?>" class="btn btn-danger">Delete</a>
                              <input type="submit" name="update" class="btn btn-primary pull-right" value="Update" >
                          </div>
                        </div>
                    </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>