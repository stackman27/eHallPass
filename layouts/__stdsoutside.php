<?php 
    require_once( "../phpfiles/connect.php"); 
    require_once( "../phpfiles/securityfiles/security.php"); 
    require_once( "selectuser.php"); 

    $student_out=$conn-> query("SELECT * FROM outside WHERE user_id = '$user_id'");
     $number_std = $student_out->num_rows; 
     
     if($number_std != '0')
     { 
         while($std_outside = $student_out->fetch_object())
         {
            $std_id = escape($std_outside->idcard);
            $std_where = escape($std_outside->whereto); 
            $std_placeid = escape($std_outside->place_id);
   ?>

<div class="panel panel-default passOut" data-toggle="modal" data-target="#myModalcheckin" id="<?php echo $std_id;?>" style = "border: 1px solid lightgray;">
    
    <div class="panel-heading text-left" style = "position: relative; background: #eee;">
        <h5><?php echo $std_where;?></h5> 
    </div>

    <div class="panel-body text-center">
        <h4><b><?php echo $std_id; ?></b></h4>
    </div>
  
</div>

<script>
    $('#' + '<?php echo $std_id;?>').click(function() {
        var id_number = '<?php echo $std_id;?>';
        callCheckin(id_number); // function inside studentoutside.js
    });
</script>

<?php } } else { ?>
<h2 id="textNoStd" style="text-align: center; color: gray"><b> No Student Outside</b></h2>
<script>
    $('.outlistCate').hide();
</script>
<?php } $conn->close(); ?>