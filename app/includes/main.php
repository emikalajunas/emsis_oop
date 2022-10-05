<?php

//authentification
if(!$session->is_signed_in()){redirect('../../login.php');}

//record STATUS CHANGE
if(isset($_GET['s1'])){
    $records = Records::find_by_id($_GET['s1']);
    $records->record_status = $records->record_status + 1;
    $records->update();
 } 

//record EDIT
if(isset($_GET['edit'])){
redirect('includes/edit_record.php');
 } 

//record DELETE
if(isset($_GET['d'])){
    $records = Records::find_by_id($_GET['d']);
    $records->delete();
 } 

//checkboxes DATA taking and forwarding to invoice.php 
if(isset($_POST['checkBoxArray'])){
    
$records_from_checkbox = $_POST['checkBoxArray'];
    
foreach($records_from_checkbox as $record_from_checkbox){
    
    echo $record_from_checkbox;
    //var_dump($record_from_checkbox);
//redirect('login.php');

//finds records in DB
//$records = Records::find_by_id($record_from_checkbox);
    //echo $records->client;

}
}
?>  
    
<div class="container">                                      
<!--Freagment keyword search Modal START-->
        <input class= modal_search id=x placeholder="<?php echo _FRAGMENTSEARCHFIELD; ?>">
            <div id=textModal_x> 
                                                                                     
            <form action="includes/invoice.php" method="post">                                                                                                                                                                                           
 <!--Table JOB_IN_QUEUE start-->           
         <div class="mt-3 row text-center">
             <h4><?php echo _JOB_IN_QUEUE; ?></h4>
         </div>
         
         <?php     
                $sql = "SELECT * FROM records WHERE record_status='1' ";
                //finds record_status limited db records
                $records = Records::find_by_query($sql); ?>
            <div class="row">                                                                                                   <?php require 'includes/table_orders.php' ?>                                                                   </div>
<!--Table end-->  
             
<!--Table JOB_IN_PROGRESS start-->
         <div class="mt-3 row text-center">
             <h4><?php echo _JOB_IN_PROGRESS; ?></h4>
         </div>
          <?php     
                $sql = "SELECT * FROM records WHERE record_status='2'";
                //finds record_status limited db records
                $records = Records::find_by_query($sql); ?>
            <div class="row">
               <?php require 'includes/table_orders.php' ?> 
           </div>              
<!--Table end--> 
    
<!--Table JOB_FINISHED start--> 
         <div class="mt-3 row text-center">
             <h4><?php echo _JOB_FINISHED; ?></h4>
         </div>
          <?php     
                $sql = "SELECT * FROM records WHERE record_status='3' ";
                //finds record_status limited db records
                $records = Records::find_by_query($sql); ?> 
            <div class="row">                                  
               <?php require 'includes/table_orders.php' ?>
           </div>             
<!--Table end--> 

  

    
<!--Invoice write/print buttons START-->
    <div class="row">      
         <div class="col-12"> 
            <input type="submit" class="btn btn-primary" name="choose_records" value="Israsyti saskaita">  
            <input type="submit" class="btn btn-primary" name="submit" value="Spausdinti">
         </div>  
     </div>  
<!--Invoice write/print buttons END--> 
            </form>
            </div>
 <!--Freagment keyword search Modal END-->
  </div> 




