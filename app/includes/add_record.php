<?php
//authentification
if(!$session->is_signed_in()){redirect('../includes/logout.php');}

//gets form DATA, saves, forwards to index
if(isset($_POST['add_record'])){
    
if($records){
$records->client                 = $_POST['client'];
$records->record_status          = 1;
$records->record_material_name   = $_POST['record_material_name'];
$records->record_layout_name     = $_POST['record_layout_name'];
$records->record_quantity        = $_POST['record_quantity'];
$records->record_dimension1      = $_POST['record_dimension1'];
$records->record_dimension2      = $_POST['record_dimension2'];
$records->record_pricelist       = $_POST['record_pricelist'];
$records->record_price           = $_POST['record_price'];
$records->record_notes           = $_POST['record_notes'];
  }
$records->create();
redirect("index.php");
}

?>

<!--START of add record form-->
<div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-6">
             <div class="card text-center text-dark bg-light mb-3 w-100">   
            <form action ="" method="post">
                <div class="mb-3">
                    <label for="title"><?php echo _ORDER_CLIENT; ?></label>
                    <input type="text" class="form-control" name="client">
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
                        <input type="text" class="form-control" name="record_layout_name">
                    </div>
                    <div class="mb-1">
                       <label for="title"><?php echo _ROLE_WIDTH; ?></label><br>
                       <select class="form-control" name="record_material_width" id="record_material_width">
                           <option value="1.37">----------------------------</option>
                           <option value="0.91">0.91 m</option>
                           <option value="1.10">1.10 m</option>
                           <option value="1.27">1.27 m</option>
                           <option value="1.37">1.37 m</option>
                           <option value="1.50">1.50 m</option>
                           <option value="1.60">1.60 m</option>
                       </select>
                    </div>
                    <div class="mb-1">
                        <label for="title"><?php echo _ORDER_QUANTITY; ?></label>
                        <input type="text" class="form-control" id="parameter_3" name="record_quantity">
                    </div>
                    <div class="mb-1">
                        <label for="title"><?php echo _RECORD_DIMENSION_1; ?></label>
                        <input type="text" class="form-control" id="parameter_1" name="record_dimension1">
                    </div>
                    <div class="mb-1">
                        <label for="title"><?php echo _RECORD_DIMENSION_2; ?></label>
                        <input type="text" class="form-control" id="parameter_2" name="record_dimension2">
                    </div>
                    <div class="mb-1">
                        <label for="title"><?php echo _RECORD_PRICELIST; ?></label>
                        <input type="text" class="form-control" id="record_pricelist" name="record_pricelist">
                    </div>
                    <div class="mb-1">
                        <label for="title"><?php echo _RECORD_PRICE; ?></label>
                        <input type="text" class="form-control" id="record_price" name="record_price">
                    </div>   
                    <div class="mb-4">                      
                        <label id="toggle" for="post_image" class='dropdown-call arrow-down'><?php echo _ORDER_NOTES; ?></label>                                                               
                        <input type="text" class="form-control-notesbox" name="record_notes">
                    </div>
                    <div class="mb-1">
                        <input class="btn btn-primary" onclick="estimateCalculation()" type="submit" name="add_record" value="??vesti darb??">
                    </div>
            </form>
                <div class="col-md-3">
                </div>
            </div>
        </div>
</div>



