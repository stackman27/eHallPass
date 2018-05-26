<?php 
  require_once("phpfiles/connect.php");
  require_once("selectuser.php");

 $i = 1;
 $select_place = $conn-> query("SELECT * FROM places WHERE user_id = '$user_id' OR user_id = 0 ORDER BY created_at DESC");
 
 while($hallpass_places = $select_place->fetch_object()){
     $place = escape($hallpass_places->place);  
     $pass_id = escape($hallpass_places->id);  
     $image = escape($hallpass_places->image);
?> 

<div class="col-xs-3 pass" style = " margin: 0; padding: 0;border-right: 1px solid gray; border-bottom: 1px solid gray; text-align: center;">

<?php 

     if($pass_id == 9){
?>
    <div class="panel panel-default passes" data-toggle="modal" data-target="#myModalOther" id = "<?php echo $place;?>" style = "padding: 5px; margin: 0; width: 98%;">
    <?php
        }
     else {
    ?> 
    <div class="panel panel-default passes" data-toggle="modal" data-target="#myModal" id = "<?php echo $place;?>"  style = "padding: 5px; margin: 0;width: 98%;" >

     <?php  } ?>

      <div class="panel-heading text-left panel-sm homepass" style = "background: #eee;"> <h4><b><?php echo $place;?></b></h4></div>   
      <img src = "images/passes/<?php echo $image;?>" style = "height: 100px; width: 100px; margin: 15px;"/> 
     </div>
</div>
 
 
 <?php
     $i++;  
 
 }
 ?>
 
 <?php 
$conn->close();
?>

 