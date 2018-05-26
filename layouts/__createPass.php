<?php 
        require_once("phpfiles/connect.php");
        require_once("selectuser.php");
?>

        <div class="container" style = "width: 100%;background: #fafafa; height: 900px; margin: 0; padding: 0;"> 
        <h1> &nbsp; <b>My Passes</b></h1>

        <?php 
 
        $i = 1;
        $select_place = $conn-> query("SELECT * FROM places WHERE user_id = '$user_id'");
        
        while($hallpass_places = $select_place->fetch_object()){ 
                $place = escape($hallpass_places->place);  
                $pass_id = escape($hallpass_places->id);  
                $image = escape($hallpass_places->image);
                ?>

           <div class="panel panel-default passes"  id = "<?php echo $place;?>" style = "border: 1px solid lightgray;">
           <div class="panel-heading text-left panel-sm" style = "background: #eee;">
                <div class = "row">
                <div class = "col-md-9"  >
                    <h4><b><?php echo $place;?></b></h4>
                 </div>

                 <div class = "col-md-3" style = "margin-top: 10px;">
                        <a href = "layouts/__delPass.php?delKey=<?php echo $pass_id;?>"> <i class="glyphicon glyphicon-trash" style = "font-size: 18px; color: red;"></i> </a>
                </div>
                </div>
           </div>   
           <img src = "images/passes/<?php echo $image;?>" style = "height: 100px; width: 100px; margin: 15px;"/> 
        </div>

        <?php
                }
        ?>

        <div class="panel panel-default passes" data-toggle="modal" data-target="#myModal_ccPass" style = "box-shadow: none; border: 2px dotted gray;">
            <div class="panel-heading panel-sm" style = "background: white;"> <h4><b>Create a Pass</b></h4></div>   
           <img src = "images/passes/6.png" style = "height: 100px; width: 100px; margin: 15px;"/>                            
      </div>
 
</div>