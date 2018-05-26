<?php 
    require("phpfiles/connect.php");
    require("layouts/selectuser.php");
    require("phpfiles/time.php");

    if($_GET['date'] != ''){
        $get_datafrom = $_GET['date'];
        $select_data = $conn -> query("SELECT * FROM totalstats WHERE user_id = '$user_id' AND DATE_FORMAT(checkouttime,'%m/%d/%Y') = '$get_datafrom' ORDER BY checkouttime DESC");
        $num_data = $select_data->num_rows;

            echo "<h2 style = 'font-weight: 900; text-shadow: 0px 1px, 1px 0px, 1px 1px;'> 
                    <b>$get_datafrom</b> 
                    </h2>   
                 <br/>";

         while($row_users = $select_data -> fetch_object()){
            $org_id = escape($row_users->id);
            $std_idnum = escape($row_users->idnumber);
            $std_whereto = escape($row_users->checkoutto);
            $std_checkintime = $row_users->checkintime;
            $std_checkouttime =  $row_users->checkouttime;
         
            date_default_timezone_set('America/Los_Angeles');

            $dateCheckin = new DateTime($std_checkintime);
            $dateCheckout = new DateTime($std_checkouttime);

            $dateCheckin->modify('-3 hours');
            $dateCheckout->modify('-3 hours');
            

           if($std_checkintime == 0){
               $std_checkintime = 'Not inside yet';
               $totaltimeOut = time_ago($std_checkouttime);
              ?>
             <tr class ="danger">
                <td><?php echo $std_idnum;?></td>
                <td><?php echo $std_whereto;?></td>
                <td> <?php echo $dateCheckout->format('h:i:s a m/d/Y') ;?></td>
                <td><?php  echo $std_checkintime; //echo $dateCheckin->format('h:i:s a m/d/Y') ;?></td> 
                <td> <?php echo $totaltimeOut;?></td>
             </tr>
              <?php 
           } 
           else {
             $to_time = strtotime($std_checkintime);
             $from_time = strtotime($std_checkouttime);
             $totaltimeOut = round(abs($to_time - $from_time) / 60,2). " minutes";

             ?>
                <tr>
                <td><?php echo $std_idnum;?></td>
                <td><?php echo $std_whereto;?></td>
                <td> <?php echo$dateCheckout->format('h:i:s a m/d/Y') ;?></td>
                <td><?php echo $dateCheckin->format('h:i:s a m/d/Y') ;?></td> 
                <td> <?php echo $totaltimeOut;?></td>
                <td class = "deletebtn" width="2%">  
                    <a href = "phpfiles/___deletedata.php?did=<?php echo $std_idnum;?>&id=<?php echo $org_id;?>&loc=ha&acdate=<?php echo $get_datafrom; ?>"> 
                        <button id = "datadelete"> 
                             <span class="glyphicon glyphicon-trash" ></span>
                         </button> 
                    </a>
                 </td>
             </tr>
             <?php 
           }
            ?>
        <?php
     }
    }   
?>