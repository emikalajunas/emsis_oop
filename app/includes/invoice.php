<?php
//connecting classes and functions
require_once 'init.php'; 

//authentification
if(!$session->is_signed_in()){redirect('../login.php');}

//function for language setup
language();
    
//Invoice serial number from DB, pluses 1 and sets new record to DB
$invoices->invoice_number = $invoices->invoice_serial_number();

//Invoice dates
//invoice WRITE date in The seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)
$invoices->invoice_date_write = date('U');

//invoice PAY date: 1. getting days Data from Class Clients 2.makes it in to seconds 3. calculates amount, 4. makes normal date format
$invoices->invoice_date_payment = $clients->client_payment_date('Zuzu') * 84600 + $invoices->invoice_date_write;                                               

//converts to tipical date DATA and stores to properties
$invoices->invoice_date_write = date('Y m d', $invoices->invoice_date_write);
$invoices->invoice_date_payment = date('Y m d', $invoices->invoice_date_payment);

//if invoice is finished and button is pushed
if(isset($_POST['write_invoice'])){
    
//creates NEW invoice in DB
//$invoices->invoice_records_ids = $records_from_checkbox; //ID: sets to database
$invoices->invoice_records_ids = $records_from_checkbox;
$invoices -> create(); 

redirect('../index.php');
}



    
//Invoice SELLER requisites from DB
$seller = "UAB Ad Park";
$seller_address = "Verkių 46, Vilnius";
$seller_code = "302547576";
$seller_vatcode = "LT1001010101";
$seller_bankaccount= "L12315151155135";
$seller_telephone= "+3701561561515";
$seller_email= "info@adpark.lt";

//Invoice BUYER requisites from DB
$buyer = "UAB Bubumomo";
$buyer_address = "Verkių 46, Vilnius";
$buyer_code = "302547576";
$buyer_vatcode = "LT1001010101";
$buyer_bankaccount= "L12315151155135";
$buyer_telephone= "+3701561561515";
$buyer_email= "info@adpark.lt";

$totalsum_withoutvat = '1';
$vat_size = '21%';
$total_sum = '???';

?>

<!DOCTYPE html>

<html lang="en">
   <!--Header start-->
<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<!-- Bootstrap CSS -->
    <link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
<!-- Custom CSS -->
    <link href="../../css/styles.css" rel="stylesheet">
    
<!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,300;1,200&display=swap" rel="stylesheet">
    
<!--Fragment Modal search script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
<!--JS script include-->
<script src="../../js/scripts.js"></script>
    
    
<!--JS scripts block start-->
<!-- Bootstrap Bundle with Popper -->
    <script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--JS scripts block end-->

    <title><?php echo _PAGETITLE; ?></title>
 
</head>
<!--Header end  -->

<body>

<div class="container">
 
 <!--Invoice HEADER row start-->
    <div class="row">      
     <div class="col-12">
        <div class="invoice_page_name"><?php echo _INVOICE_NAME; ?></div>
     </div>  
     </div>  
<!--Invoice HEADER row end--> 
  
<!--Invoice Number row start-->
    <div class="row">      
     <div class="col-12">
        <div class="invoice_page_number"><?php echo _INVOICE_SERIES; ?>: <?php echo _INVOICE_SERIES_FIRSTLETTERS; ?> <?php echo $invoices->invoice_number; ?></div>
     </div>  
     </div>  
<!--Invoice Number row end--> 

<!--Invoice write Date row start-->
 <div class="row">      
     <div class="col-12">
        <div class="invoice_page_write_date"><?php echo _INVOICE_WRITEDATE; ?>: <?php echo $invoices->invoice_date_write; ?></div>
     </div>  
     </div>  
<!--Invoice write Date row end-->

<!--Invoice details row start-->
 <div class="row">          
    <div class="col-6">
       <table class="invoice_page_content_table"> 
            <tr>
                <th><?php echo _INVOICE_REQUISITES_SELLER; ?>: <?php echo $seller; ?> </th>
            </tr>
            <tr>
                <td><?php echo _INVOICE_REQUISITES_SELLER_TABLEADDRESS; ?>: <?php echo $seller_address; ?></td>
            </tr>
            <tr>
                <td><?php echo _INVOICE_REQUISITES_SELLER_CODE; ?>: <?php echo $seller_code; ?></td>
            </tr>
            <tr>
                <td><?php echo _INVOICE_REQUISITES_SELLER_VATCODE; ?>: <?php echo $seller_vatcode; ?></td>
            </tr>
            <tr>
                <td><?php echo _INVOICE_REQUISITES_SELLER_BANKACCOUNT; ?>: <?php echo $seller_bankaccount; ?></td>
            </tr>
            <tr>
                <td><?php echo _INVOICE_REQUISITES_SELLER_TELEPHONE; ?>: <?php echo $seller_telephone; ?></td>
            </tr>
            <tr>
                <td><?php echo _INVOICE_REQUISITES_SELLER_EMAIL; ?>: <?php echo $seller_email; ?></td>
            </tr>
       </table>
     </div>
    <div class="col-6">
        <table table class="invoice_page_content_table"> 
            <tr>
                <th><?php echo _INVOICE_REQUISITES_BUYER; ?>: <?php echo $buyer; ?> </th>
            </tr>
            <tr>
                <td><?php echo _INVOICE_REQUISITES_BUYER_TABLEADDRESS; ?>: <?php echo $buyer_address; ?></td>
            </tr>
            <tr>
                <td><?php echo _INVOICE_REQUISITES_BUYER_CODE; ?>: <?php echo $buyer_code; ?></td>
            </tr>
            <tr>
                <td><?php echo _INVOICE_REQUISITES_BUYER_VATCODE; ?>: <?php echo $buyer_vatcode; ?></td>
            </tr>
            <tr>
                <td><?php echo _INVOICE_REQUISITES_BUYER_BANKACCOUNT; ?>: <?php echo $buyer_bankaccount; ?></td>
            </tr>
            <tr>
                <td><?php echo _INVOICE_REQUISITES_BUYER_TELEPHONE; ?>: <?php echo $buyer_telephone; ?></td>
            </tr>
            <tr>
                <td><?php echo _INVOICE_REQUISITES_BUYER_EMAIL; ?>: <?php echo $buyer_email; ?></td>
            </tr>
       </table>
    </div>  
    </div>  
<!--Invoice details row start-->

<!--Invoice paytill row start-->
 <div class="row">      
     <div class="col-12">
        <div class="invoice_page_paytill"><?php echo _INVOICE_PAYDATE; ?>: <?php echo $invoices->invoice_date_payment; ?></div>
     </div>  
     </div>  
<!--Invoice paytill Date row end-->

<!--Invoice content table row start-->
<div class="row">                    
    <div class="col-12">
       <table class="invoice_page_content_table"> 
            <tr>
                <th><?php echo _INVOICE_TABLE_CONTENT_NUMBER; ?></th>
                <th><?php echo _INVOICE_TABLE_CONTENT_PRODUCTSERVICE; ?></th>
                <th><?php echo _INVOICE_TABLE_CONTENT_MATERIAL; ?></th>
                <th><?php echo _INVOICE_TABLE_CONTENT_UNIT; ?></th>
                <th><?php echo _INVOICE_TABLE_CONTENT_QUANTITY; ?></th>
                <th><?php echo _INVOICE_TABLE_CONTENT_UNITPRICE; ?></th>
                <th><?php echo _INVOICE_TABLE_CONTENT_AMOUNT; ?></th>
            </tr>
  
<?php if(isset($_POST['checkBoxArray'])){
    
$records_from_checkbox = $_POST['checkBoxArray'];
    
foreach($records_from_checkbox as $record_from_checkbox){

//finds records in DB
$records = Records::find_by_id($record_from_checkbox);
    

?>           
            <tr>
                <td>1</td>
                <td><?php echo $records->record_layout_name; ?></td>
                <td><?php echo $records->record_material_name; ?></td>
                <td><?php echo _INVOICE_TABLE_CONTENT_UNIT;?></td>
                <td><?php echo $records->record_quantity; ?></td>
                <td>1.75</td>
                <td>1.75</td>
            </tr> 

<?php }} ?>
  
   <?php


//Record IDs DATA converts to string
$records_from_checkbox = implode("", $records_from_checkbox); 
echo $records_from_checkbox;

?> 
   
   
   
   
   
    </table>
    </div>         
    </div> 
 <!--Invoice content table row start-->
 

 
  
  
  
<!--Invoice total sum row end--> 
   <div class="row">      
     <div class="col-12">
        <div class="invoice_page_totalsum"><?php echo _INVOICE_TOTALSUM_WITHOUTVAT; ?>: <?php echo $totalsum_withoutvat; ?></div>
     </div>  
     </div>  
<!--Invoice total sum row end--> 
  
<!--Invoice total vat size start--> 
   <div class="row">      
     <div class="col-12">
        <div class="invoice_page_vat"><?php echo _INVOICE_VAT_NAME; ?>: <?php echo $vat_size; ?></div>
     </div>  
     </div>  
<!--Invoice total vat size end-->
  
<!--Invoice total vat size start--> 
   <div class="row">      
     <div class="col-12">
        <div class="invoice_page_totalamount"><?php echo _INVOICE_TOTALSUM;?>: <?php echo $total_sum;?></div>
     </div>  
     </div>  
<!--Invoice total vat size end-->
  
<!--Invoice total amount in words start--> 
<!--
   <div class="row">      
     <div class="col-12">
        <div class="invoice_page_totalamountinwords">Suma zodziais: ???</div>
     </div>  
     </div>  
-->
<!--Invoice total amount in words end-->
  
<!--Invoice written by start--> 
   <div class="row">      
     <div class="col-12">
        <div class="invoice_page_writtenby"><?php echo _INVOICE_SELLER_SIGNATURE;?>:</div>
     </div>  
     </div>  
<!--Invoice written by end-->
  
<!--Invoice got by start--> 
   <div class="row">      
     <div class="col-12">
        <div class="invoice_page_gotby"><?php echo _INVOICE_BUYER_SIGNATURE;?>:</div>
     </div>  
     </div>       
<!--Invoice got by end-->
  
<!--Invoice confirm button start-->
    <div class="row">      
     <div class="col-12">
        <form class="invoice_page_buttons" action="invoice.php" method="post">
            <input type="submit" class="btn btn-primary" name="write_invoice" value="Israsyti">  
            <input type="submit" class="btn btn-primary" name="submits" value="Spausdinti">  
            <a class="btn btn-primary" href="../index.php" role="button">Grizti</a>
        </form>
     </div>  
     </div>  
<!--Invoice confirm button end-->   
    </div> 
 </body>
</html> 

