<?php 
    require_once("phpfiles/connect.php");
    require_once("layouts/selectuser.php");

    //select CONVERT (varchar(10), getdate(), 103) AS [DD/MM/YYYY]
    //     $select_all = $conn-> query("SELECT * FROM totalstats WHERE user_id = '$user_id' AND  DATE(checkouttime) = DATE(NOW() - INTERVAL 0 DAY) ORDER BY checkouttime DESC");
    $select_dates = $conn -> query("SELECT DISTINCT DATE_FORMAT(checkouttime,'%m/%d/%Y') AS niceDate FROM totalstats WHERE user_id = '$user_id' ORDER BY checkouttime DESC LIMIT 10");
    
    while($row = $select_dates->fetch_object()){
        // $n_uid = $row->user_id;
         //$n_idnum = $row->idnumber;
         //$n_checkoutto = $row->checkoutto;

        //$date= new DateTime($row['your_date']) ;  
        //echo $date->format('Y-m-d');


        // $n_outtime = new DateTime ($row->checkouttime);
        // $n_intime = new DateTime ($row->checkintime);


       $n_outtime = $row->niceDate;
       $select_num_users = $conn -> query("SELECT * FROM totalstats WHERE user_id = '$user_id' AND DATE_FORMAT(checkouttime,'%m/%d/%Y') = '$n_outtime'");
       $select_num = $select_num_users->num_rows;
        // echo  $n_uid. ' '. $n_idnum. ' '. $n_checkoutto. ' '. $n_outtime->format('Y-m-d') . ' '. $n_intime->format('Y-m-d').'<br/>';
        ?>
            <a href = "?date=<?php echo $n_outtime;?>">
            <div class="panel panel-default passes"  data-toggle="modal" data-target="#myModalcheckin" id = "<?php echo $std_id;?>" style = "border: 1px solid lightgray;"> 
                <div class="panel-body text-center">  
                <h4><b><?php echo $n_outtime; ?></b></h4>
                </div>
                <div class="panel-footer text-center"><h5>Stds Out: <b><?php echo $select_num;?></b></h5></div>
            </div>     
            </a>
        <?php
    }

  
    $conn->close();

?>