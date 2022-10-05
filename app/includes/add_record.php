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
<!--
                   <div class="form-group">
                        <label for="title">Kaina už kv.m</label>
                        <input type="text" class="form-control_addrecord" id="parameter_4" name="record_price_of_sqm">
                    </div>
-->
<!--
                    <div class="form-group">
                         <label for="title">Sąmata</label>
                        <input type="text" class="form-control_addrecord" id="estimateResult" value="0" name="record_estimate">
                    </div>
-->


        <!--Estimate SCARPS calculation START-->

        <?php
//
//        //example task: measurements 50x80 cm, quantity 5 units.
//
//        if (isset($_POST['add_record'])){
//        $record_material_roll_width = $_POST['record_material_width']; //example 1.6
//
//        $record_quanity_in_line_1 = $record_material_roll_width / $record_dimension1; //result fits 3
//        $record_quanity_in_line_2 = $record_material_roll_width / $record_dimension2; //result fits 2
//
//        //if($record_quanity_in_line_1 < $record_quanity_in_line_2) {
//        if(1 < 2) {
//
//        ////checks how much records fits in one whole role string
//        //$check_2 = $record_dimension2 * $record_dimension2 * $record_quanity_in_line_2;
//        //
//        ////first scrap
//        //$record_scarp_1 = $record_material_roll_width - $check_2;
//        //
//        //$record_whole_blocks_without_scarp = $record_quantity / $record_quanity_in_line_2;
//        //$record_whole_blocks_without_scarp = round($record_whole_blocks_without_scarp);
//        //
//        ////coounts whole blocks lentgh
//        //$record_whole_blocks_without_scarp_length = $record_whole_blocks_without_scarp * $record_dimension2;
//        //
//        ////counts last scrap
//        //$record_scrap_2 = $record_dimension1 * $record_dimension2 * ($record_quantity - ($record_whole_blocks_without_scarp * $record_quanity_in_line_1));
//        //
//        //$record_scrap_total = $record_scarp_1 + $record_scrap_2;
//        //
//        //}
//        //else {
//
//        //0.8 m
//
//        //checks how much records fits in one whole role string
//        $check_1 = $record_dimension1 * $record_quanity_in_line_1;
//
//        //first scrap
//        $record_scarp_1 = $record_material_roll_width - $check_1;
//
//        $record_whole_blocks_without_scarp = $record_quantity / $record_quanity_in_line_1;
//
//        //counts whole blocks
//        $record_whole_blocks_without_scarp = round($record_whole_blocks_without_scarp);
//
//        //coounts whole blocks lentgh
//        $record_whole_blocks_without_scarp_length = $record_whole_blocks_without_scarp * $record_dimension1;
//
//        //counts last scrap
//        $record_scrap_2 = $record_dimension1 * $record_dimension2 * ($record_quantity - ($record_whole_blocks_without_scarp * $record_quanity_in_line_1));
//
//        $record_scrap_total = $record_quanity_in_line_1;
//
//
//
//        //sets DATA to record_material_scrap db
//        $query = "UPDATE records SET record_material_scrap='$record_scrap_total'";
//        if (mysqli_query($conSecure, $query)) {
//        echo "New record created successfully";
//        } else {
//        echo "Error: " . $query . "<br>" . mysqli_error($conSecure);
//        }
//
//        }
//        }

        ?>
        <!--Estimate SCARPS calculation END          -->


        <!--Estimate PRICE calculator START-->
        <!--Estimate caclualtion script START-->

<!--
        <script type="text/javascript">

                    function estimateCalculation() {
                      var a = document.getElementById("parameter_1").value;
                      var b = document.getElementById("parameter_2").value;
                      var c = document.getElementById("parameter_3").value;
                      var d = document.getElementById("parameter_4").value;
        //              var e = document.getElementById("record_material_width").value;
                      var f = document.getElementById('record_transportation').value;

        //            if (typeof f === 'undefined') {
        //
        //            } else { f = 4;}

        //              alert(a);alert(b);alert(c);alert(d);alert(f);
                      var z = a * b * c * d + +f;
        //              var z = z + f;
                      alert("Šio gaminio kaina:" + " " + z + " " + "eur be PVM");


                      document.getElementById("estimateResult").value = z;
                      window.location.reload();
                     }

        </script>
-->

        <!--Estimate caclualtion script END-->

<!--
                    <div class="form-group">
                        <label for="post_status">Apdirbimo informacija </label>
                        <input type="text" class="form-control_addrecord" name="record_option1">
                    </div>

                    <div class="form-group">
                       <label for="title">Pristatymas</label><br>
                       <select name="record_logistics" id="record_transportation">
                           <option value="0">----------------------------</option>
                           <option value="0">Klientas pasiima pats</option>
                           <option value="4" id="">Siunčiame su VENIPAK</option>
                           <option value="4" id="">Siunčiame su DPD</option>
                       </select>
                    </div>
-->                    
                    <div class="mb-4">                      
                        <label id="toggle" for="post_image" class='dropdown-call arrow-down'><?php echo _ORDER_NOTES; ?></label>                                                               
                        <input type="text" class="form-control-notesbox" name="record_notes">
                    </div>
                    <div class="mb-1">
                        <input class="btn btn-primary" onclick="estimateCalculation()" type="submit" name="add_record" value="Įvesti darbą">
                    </div>
            </form>
                <div class="col-md-3">
                </div>
            </div>
        </div>
</div>



