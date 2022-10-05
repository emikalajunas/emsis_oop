<?php
//connecting classes and functions
require_once 'includes/init.php'; 

//authentification
if(!$session->is_signed_in()){redirect('../login.php');}

//function for language setup
language();

//connecting header
require_once 'includes/header.php';
?>

<!--Meniu start-->
        <div class="meniu_main">
             <?php include_once 'includes/meniu.php'; ?>
        </div>
<!--Meniu end--> 

<?php 

//switch    
if(isset($_GET['action'])){
    $action = $_GET['action'];
	 switch ($action){
        case 'add_record':
        include 'includes/add_record.php';
        break;
             
        case 'invoices':
        include 'includes/invoices_list.php'; //Invoices.php brings list of invoices
        break;
             
        case 'edit':
        include 'includes/edit_record.php';
        break;

        case 'dashboard':
        include 'includes/dashboard.php';
        break;

        case 'archive':
        include 'includes/archive.php';
        break;

        default:
        redirect('../login.php');
        break;
    }
} else {include 'includes/main.php';}
?>

<!--Footer start-->
<?php require_once 'includes/footer.php' ?>

