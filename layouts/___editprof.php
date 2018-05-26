<div class="form-group"> 
        <label for="curr_<?php echo $reference;?>" style = "font-size: 14px;">Please Enter your current <?php echo $name;?>:</label>
        <input type="text" class="form-control" id="curr_<?php echo $reference;?>" name = "curr_<?php echo $reference;?>" placehold = "Current <?php echo $name;?>" autofocus/>
        <br/>
        <label for="new_<?php echo $reference;?>" style = "font-size: 14px;">Please Enter your new <?php echo $name;?>:</label>
        <input type="text" class="form-control" id="new_<?php echo $reference;?>" name = "new_<?php echo $reference;?>" placehold = "New <?php echo $name;?>" />

        <br/>
        <button class = "btn btn-primary btn-lg"  type = "button" id = "edit_prof" name = 'subPass'>Save Changes</button> 
</div> 
 