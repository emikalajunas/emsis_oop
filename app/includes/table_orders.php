<!--Table start-->
             <div class="card border-light mb-3">
              <table id="main_page_content_table">
<!--              <input type="submit" name="submit" class="btn btn-success" value="Apply"> -->
               <thead>
                <tr>               
                   <th><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></th>                   
                   <th><?php echo _ORDER_CLIENT; ?></th>                   
                   <th><?php echo _ORDER_QUANTITY; ?></th>                   
                   <th><?php echo _ORDER_LAYOUT_NAME; ?></th>
                   <th><?php echo _ORDER_BUTTON_START; ?></th>
                   <th><?php echo _ORDER_BUTTON_EDIT; ?></th>
                   <th><?php echo _ORDER_BUTTON_DELETE; ?></th>                 
                </tr>           
               </thead>
               <tbody>
                   <?php foreach($records as $record):  ?>                
                    <tr>  
                       <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="<?php echo $record->id; ?>"></td>

                       <td><?php echo $record->client; ?></td>
                       <td><?php echo $record->record_quantity; ?></td>
                       <td><?php echo $record->record_layout_name;?></td>
                       <td><a href="index.php?s1=<?php echo $record->id; ?>"><img src='../images/icons/start_icon.png'  alt='Start job button' height='22px' width='22px'></a></td> 
                       <td><a href="index.php?action=edit&id=<?php echo $record->id; ?>&s=<?php echo $record->record_status;?>"><img src='../images/icons/edit_icon.png'  alt='Start job button' height='22px' width='22px'></a></td> 
                       <td><a href="index.php?d=<?php echo $record->id; ?>"><img src='../images/icons/delete_icon.png'  alt='Start job button' height='22px' width='22px'></a></td>                   
                    </tr> 
                   <?php endforeach;  ?>
                </tbody>
               </table>
            </div>
<!--Table end-->   