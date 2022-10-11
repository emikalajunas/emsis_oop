<?php 
//connecting classes and functions
require_once 'init.php';

//gets form DATA URL, updates, forwards to index
if(isset($_POST['submit'])){
if(isset($_GET['id'])){     
        
$records->id = $_GET['id'];
$records->client                 = $_POST['client'];
$records->record_status          = $_GET['s'];
$records->record_material_name   = $_POST['record_material_name'];
$records->record_layout_name     = $_POST['record_layout_name'];
$records->record_quantity        = $_POST['record_quantity'];
$records->record_dimension1      = $_POST['record_dimension1'];
$records->record_dimension2      = $_POST['record_dimension2'];
$records->record_notes           = $_POST['record_notes'];
  }

$records->update();
redirect('index.php');    
}

//gets record DATA from db and sets to placeholders
$records = Records::find_by_id($_GET['id']);
?>

<!--START of add record form-->
<div class="row">
          <div class="col-md-3">          
          </div>          
          <div class="col-6">
             <div class="card text-center text-dark bg-light mb-3 w-100">   
            <form action ="" method="post" enctype="multipart/form-data">
                <div class="mb-1">
                    <label for="title"><?php echo _ORDER_CLIENT; ?></label>
                    <input type="text" class="form-control" name="client" value="<?php echo $records->client; ?>">
                </div>
                    <div class="mb-1">
                      <label for="title"><?php echo _ORDER_MATERIAL ?></label><br>
                       <select class="form-control text-center" name="record_material_name" id="">
                           <option value="<?php echo _CHOOSE_MATERIAL_SELECTOR; ?>"><?php echo _CHOOSE_MATERIAL_SELECTOR; ?></option>
                           <option value="<?php echo _MATERIAL_VINYL_GLOSS; ?>"><?php echo _MATERIAL_VINYL_GLOSS; ?></option>
                           <option value="<?php echo _MATERIAL_VINYL_MATT; ?>"><?php echo _MATERIAL_VINYL_MATT; ?></option>
                           <option value="<?php echo _MATERIAL_VINYL_TRANSPARENT; ?>"><?php echo _MATERIAL_VINYL_TRANSPARENT; ?></option>
                           <option value="<?php echo _MATERIAL_BACKLIGHT; ?>"><?php echo _MATERIAL_BACKLIGHT; ?></option>
                           <option value="<?php echo _MATERIAL_BANNER; ?>"><?php echo _MATERIAL_BANNER; ?></option>
                           <option value="<?php echo _MATERIAL_BANNER_ROLLUP; ?>"><?php echo _MATERIAL_BANNER_ROLLUP; ?></option>
                           <option value="<?php echo _MATERIAL_PAPER_115; ?>"><?php echo _MATERIAL_PAPER_115; ?></option>
                           <option value="<?php echo _MATERIAL_PAPER_130; ?>"><?php echo _MATERIAL_PAPER_130; ?></option>
                           <option value="<?php echo _MATERIAL_PAPER_150; ?>"><?php echo _MATERIAL_PAPER_150; ?></option>
                           <option value="<?php echo _MATERIAL_PAPER_170; ?>"><?php echo _MATERIAL_PAPER_170; ?></option>
                           <option value="<?php echo _MATERIAL_PAPER_200; ?>"><?php echo _MATERIAL_PAPER_200; ?></option>
                           <option value="<?php echo _MATERIAL_PAPER_300; ?>"><?php echo _MATERIAL_PAPER_300; ?></option>
                       </select>
                    </div>
                    <div class="mb-1">
                        <label for="title"><?php echo _ORDER_LAYOUT_NAME; ?></label>
                        <input type="text" class="form-control" name="record_layout_name" value="<?php echo $records->record_layout_name; ?>">
                    </div>
                    <div class="mb-1">
                        <label for="title"><?php echo _ORDER_QUANTITY; ?></label>
                        <input type="text" class="form-control" id="parameter_3" name="record_quantity" value="<?php echo $records->record_quantity; ?>">
                    </div>
                    <div class="mb-1">
                        <label for="title"><?php echo _RECORD_DIMENSION_1; ?></label>
                        <input type="text" class="form-control" id="parameter_1" name="record_dimension1" value="<?php echo $records->record_dimension1; ?>">
                    </div>

                    <div class="mb-1">
                        <label for="title"><?php echo _RECORD_DIMENSION_2; ?></label>
                        <input type="text" class="form-control" id="parameter_2" name="record_dimension2" value="<?php echo $records->record_dimension2; ?>">
                    </div>
        <script type="text/javascript">

                    function estimateCalculation() {
                      var a = document.getElementById("parameter_1").value;
                      var b = document.getElementById("parameter_2").value;
                      var c = document.getElementById("parameter_3").value;
                      var d = document.getElementById("parameter_4").value;
                      var f = document.getElementById('record_transportation').value;
                      var z = a * b * c * d + +f;
                      alert("Šio gaminio kaina:" + " " + z + " " + "eur be PVM");


                      document.getElementById("estimateResult").value = z;
                      window.location.reload();
                     }

        </script>

<!--Record notes slider modul START-->
                    <div class="mb-4">                      
                        <label id="toggle" for="post_image" class='dropdown-call arrow-down'><?php echo _ORDER_NOTES; ?></label>                                                               <input type="text" class="form-control-notesbox" name="record_notes" value="<?php echo $records->record_notes; ?>">
                    </div>
<!--Record notes slider modul END-->
                    <div class="mb-1">
                        <input class="btn btn-primary" onclick="estimateCalculation()" type="submit" name="submit" value="<?php echo _BUTTON_SUBMIT_RECORD ?>">
                    </div>
            </form>
                <div class="col-md-3">
                </div>
            </div>
        </div>
</div>

