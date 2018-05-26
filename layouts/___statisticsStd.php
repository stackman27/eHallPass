<?php 
   date_default_timezone_set('America/Los_Angeles'); 

    if(isset($_GET['date']))
        $getdate=$_GET['date']; 
    ?>

<script>
    $(function() {
        $('input.typeahead').typeahead({
            name: 'typeahead',
            remote: 'phpfiles/___searchstats.php?key=%QUERY',
            limit: 10,
        }); <?php
        if (isset($_GET['stdid'])) {
            $id_txt = $_GET['stdid']; ?>
            $('#searchbox').val("<?php echo htmlspecialchars($id_txt);?>"); <?php
        } ?>

        $('#searchidnum').click(function() {
            var hh = $('#searchbox').val();
            var todayDate = '<?php echo date('Y-m -d ',strtotime(" - "."0"."days "));?>';
            document.getElementById("searchidnum").href = "myaccount.php?stdid=" + hh;
        });
    });
</script>


<div class="latestdates">
    <a class="col-md-2" href="?date=<?php echo date('Y-m-d',strtotime(" - "."0"."days ")); ?>" id="0">
        <?php echo "Today";?>
    </a>
    <?php for ($i=1; $i <=5 ; $i++) { ?>
    <a class="col-md-2" href="?date=<?php  echo date('Y-m-d',strtotime(" - ".$i."days ")); ?>" id="<?php echo $i; ?>">
        <?php echo date( 'm/d/Y',strtotime( "-".$i. "days"));?>
    </a>
    <?php } ?>
</div>

<div class="holdTable">

    <div class="holdall_btns">
        <div class="holdSearch">
            <input type="text" class="typeahead tt-query" name="typeahead" id="searchbox" autocomplete="off" spellcheck="false" placeholder="Search id number" size="25" />
            <a class="btn btn-primary" type="button" id="searchidnum" style="margin-left: 2vh;margin-top: 5px;">
                <i class="glyphicon glyphicon-search"></i>
                </span>
            </a>
        </div>

        <div class="holdBtns">
            <a class="btn btn-primary" href="history.php?date=" type="button" style="margin-right: 15px; margin-top: 5px;">History</a>
            <div class="btn-group">
                <a href="#" class="btn btn-default">Sort By</a>
                <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                <ul class="dropdown-menu" style="margin-left: -52px; margin-top: 5px;">
                    <li><a href="#">Id Number</a>
                    </li>
                    <li><a href="#">Checkout Time</a>
                    </li>
                    <li><a href="#">Checkin Time</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <br/>
    <br/>
    <br/>

    <table class="table table-bordered dataTable">
        <thead>
            <tr style="font-size: 18px;">
                <th>Id Number</th>
                <th>Check-Out To</th>
                <th>Check-Out Time</th>
                <th>Check-In Time</th>
                <th>Time Out</th> 
            </tr>
        </thead>
        <tbody style="font-size: 14px;">
            <?php 
            require_once( "phpfiles/time.php"); 
            $linkdot="../phpfiles/connect.php" ; // correctly implement connect.php in selectuser.php 
            require_once( "layouts/selectuser.php"); 

            $totaltimeOut='' ; 
            $today= date( 'Y-m-d'); 
                if(isset($_GET[ 'date'])) { if($_GET[ 'date']==Date( 'Y-m-d')){ $select_all=$conn-> query("SELECT * FROM totalstats WHERE user_id = '$user_id' AND DATE(checkouttime) = DATE(NOW() - INTERVAL 0 DAY) ORDER BY checkouttime DESC"); ?>
          
          <script>
                $('#0').css({
                    'background-color': '#2196F3',
                    'color': '#fff'
                });
            </script>
            <?php } else if($_GET['date']==Date( 'Y-m-d', strtotime( "-1 days"))) { $select_all=$conn-> query("SELECT * FROM totalstats WHERE user_id = '$user_id' AND DATE(checkouttime) = DATE(NOW() - INTERVAL 1 DAY) ORDER BY checkouttime DESC"); ?>
            <script>
                $('#1').css({
                    'background-color': '#2196F3',
                    'color': '#fff'
                });
            </script>
            <?php } else if($_GET['date']==Date( 'Y-m-d', strtotime( "-2 days"))){ $select_all=$conn-> query("SELECT * FROM totalstats WHERE user_id = '$user_id' AND DATE(checkouttime) = DATE(NOW() - INTERVAL 2 DAY) ORDER BY checkouttime DESC"); ?>
            <script>
                $('#2').css({
                    'background-color': '#2196F3',
                    'color': '#fff'
                });
            </script>
            <?php } else if($_GET['date']==Date( 'Y-m-d', strtotime( "-3 days"))){ $select_all=$conn-> query("SELECT * FROM totalstats WHERE user_id = '$user_id' AND DATE(checkouttime) = DATE(NOW() - INTERVAL 3 DAY) ORDER BY checkouttime DESC"); ?>
            <script>
                $('#3').css({
                    'background-color': '#2196F3',
                    'color': '#fff'
                });
            </script>
            <?php } else if($_GET['date']==Date( 'Y-m-d', strtotime( "-4 days"))){ $select_all=$conn-> query("SELECT * FROM totalstats WHERE user_id = '$user_id' AND DATE(checkouttime) = DATE(NOW() - INTERVAL 4 DAY) ORDER BY checkouttime DESC"); ?>
            <script>
                $('#4').css({
                    'background-color': '#2196F3',
                    'color': '#fff'
                });
            </script>
            <?php } else if($_GET['date']==Date( 'Y-m-d', strtotime( "-5 days"))){ $select_all=$conn-> query("SELECT * FROM totalstats WHERE user_id = '$user_id' AND DATE(checkouttime) = DATE(NOW() - INTERVAL 5 DAY) ORDER BY checkouttime DESC"); ?>
            <script>
                $('#5').css({
                    'background-color': '#2196F3',
                    'color': '#fff'
                });
            </script>
            <?php } else { $select_all=$conn-> query("SELECT * FROM totalstats WHERE user_id = '$user_id' AND DATE(checkouttime) = DATE(NOW() - INTERVAL 0 DAY) ORDER BY checkouttime DESC"); ?>
            <script>
                $('#6').css({
                    'background-color': '#2196F3',
                    'color': '#fff'
                });
            </script>
            <?php }} else if(isset($_GET[ 'stdid'])) { $stdid_num=$_GET['stdid']; $select_all=$conn -> query("SELECT * FROM totalstats WHERE user_id = '$user_id' AND idnumber LIKE '%{$stdid_num}%'"); } 
                else { ?>
            <script>
                window.location.href = "home.php";
            </script>
            <?php } // YESTERDAY 'S DATA date_column = curdate() - interval 1 day
 
        while($row_users = $select_all -> fetch_object()){
               $org_id = escape($row_users->id);
               $std_idnum = escape($row_users->idnumber);
               $std_whereto = escape($row_users->checkoutto);
               $std_checkintime = $row_users->checkintime;
               $std_checkouttime =  $row_users->checkouttime;
             
 
               $dateCheckin = new DateTime($std_checkintime);
               $dateCheckout = new DateTime($std_checkouttime);
 
               $dateCheckin->modify('-3 hours');
               $dateCheckout->modify('-3 hours');
               
             //  echo $dateCheckin->format("Y-m-dTH:i:s");
             

              if($std_checkintime == 0){
                  $std_checkintime = 'Not inside yet ';
                  $totaltimeOut = time_ago($std_checkouttime);
                 ?>
                <tr class ="danger">
                   <td><?php echo $std_idnum;?></td>
                   <td><?php echo $std_whereto;?></td>
                   <td> <?php echo $dateCheckout->format('h:i:s a m/d/Y ');?></td>
                   <td><?php  echo $std_checkintime; //echo $dateCheckin->format('h:i:s a m/d/Y ') ;?></td> 
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
                   <td> <?php echo $dateCheckout->format('h:i:s a m/d/Y ');?></td>
                   <td><?php echo $dateCheckin->format('h:i:s a m/d/Y ');?></td> 

                   <!--<td> <?php echo $dateCheckout->format('h:i:s a m/d/Y ');?></td>
                   <td><?php echo $dateCheckin->format('h:i:s a m/d/Y ');?></td> 
                   -->

                   <td> <?php echo $totaltimeOut;?></td>
                   <td class = "deletebtn" width="2%">  
                    <a href = "phpfiles/___deletedata.php?did=<?php echo $std_idnum;?>&id=<?php echo $org_id;?>&loc=ma&acdate=<?php echo $getdate; ?>"> 
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
        $conn->close();  

       ?>
    </tbody>
</table>
</div>
 