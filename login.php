<?php require_once 'app/includes/init.php'; ?>

<?php
//1. $_GETs lang, 2. sets $_SESSION, 3. includes language file 
if(isset($_GET['lang']) && !empty($_GET['lang'])){
    
    $_SESSION['lang'] = $_GET['lang'];
    
    if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){  
        
        //refreshing a page
        echo "<script type='ttext/javascript'>location.reload();</script>";        
    }
}

//function for language setup
language();

?>

<?php

if(isset($_POST['submit'])){
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

//CHECKS database IS USER THERE (Calling STATIC method with ::)
    $user_found = User::verify_user($username, $password);  

//IF USER IS FOUND THEN..
if($user_found){

    $session->login($user_found);


    $var = $session->user_id;

    if ($session->is_signed_in() == TRUE) {

        $var2 = "true";

    } else {

        $var2 = 'false';

    }

    redirect("app/index.php");

} else {

    $the_message = _LOGIN_ERROR;

    }
} else {

    $username       = null; //or empty "" string
    $password       = null; //or empty "" string
    $the_message    = null;

}

?>

<!doctype html>
<html lang="en">
  <head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<!-- Bootstrap CSS -->
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
<!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">
    
<!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,300;1,200&display=swap" rel="stylesheet">

    <title><?php echo _PAGETITLE; ?></title>
  </head>
  <body> 
          <div class="container">
              <div class="row justify-content-md-center">
                    <div class="col-md-6">                   
<!--Login form start-->                        
<!--   Language selector start-->
                        <div class="login_page_form">  
                       <form action="" method="get" id="language_form">
                                <img src="images/logo/2021_08_10_logo.png" alt="logo_image" class="rounded mx-auto d-block mb-3" width="100" height="100">
                                <select class="form-control mb-4" aria-label="Default select example" name="lang" onchange="changeLanguage()">         
                                  <option value="">Choose language</option>
                                  <option value="en" <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){echo "selected";} ?> >English</option>
                                  <option value="lt" <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'lt'){echo "selected";} ?>>Lietuviškai</option>
                                </select> 
                       </form>
<!--   Language selector end     -->  
<!--   Text inputs block start-->
<!--Error message start-->
                           <p><?php echo $the_message; ?></p>
<!--Error message end-->
                        <form  action="" method="post">
                               <div class="input-group">
                                   <input type="text" name="username" placeholder="<?php echo _LOGIN_USERNAME;?>" class="form-control">
                               </div>
                                <div class="input-group">
                                    <input type="login_password" name="password" placeholder="<?php echo _LOGIN_PASSWORD;?>" class="form-control">
                               </div> 
                                <div class="input-group mb-4">
                                    <input type="login_email" name="email" placeholder="<?php echo _LOGIN_EMAIL;?>" class="form-control" />
                               </div>
                               <div class="text-center">
                                    <input type="submit" name="submit" value="<?php echo _LOGIN_BUTTON;?>" class="btn btn-primary">   
                               </div>
                        </form>
                        </div> 
<!--   Text inputs block end--> 
<!--Login form end-->                                            
                        </div>
                  </div>
          </div>     
          
<!-- Bootstrap Bundle with Popper -->
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
<!--Language change start-->
    <script>        
        function changeLanguage(){
           document.getElementById('language_form').submit();
        }        
    </script>
<!--Language change start end-->
    <footer>         
          <div class="login_page_footer">              
              <div class="text-center">
                  <a href="#"><img src="images/icons/facebook_icon.png" alt="facebook_icon" width="30" height="30"></a>
                  <a href="tel:+37067389506"><img src="images/icons/call_icon.png" alt="call_icone" width="30" height="30"></a>
                   <p class="login_page_footer_text"><?php echo _LOGIN_FOOTER;?></p>                 
              </div>
     </div>
    </footer>
  </body>
</html>