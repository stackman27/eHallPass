<?php  
    if(isset($_GET['f'])){
        switch ($_GET['f']) {
        case 'out':
            checkout();
            break;
            
        case 'in':
            checkin();
            break;

        default:
            header('Location:home.php');
            break;
        }
    }

    function checkout(){
     require_once("connect.php");
     require_once("securityfiles/security.php");

    // $now = new DateTime();
    // $now->setTimezone(new DateTimeZone('America/Los_Angeles'));
    // echo $now->format('Y-m-d H:i:s T');

     $linkdot = "phpfiles/connect.php";
     require_once("../layouts/selectuser.php");

      if(isset($_POST['gooutuser'])){
          if(isset($_POST['whereto'], $_POST['idnumber'])){

                $filter_whereto = escape($_POST['whereto']);
                $filter_idnumber = escape($_POST['idnumber']);
                $checkout_time = "";
        
                /*
                * SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
                    FROM Orders
                    INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
                    Try it Yourself »
                */
                
                 date_default_timezone_set('America/Los_Angeles'); 
 
                $select_placeid = $conn -> query("SELECT id FROM places WHERE place = '$filter_whereto'"); 
                $row_place = $select_placeid -> fetch_object();  
                
                if($select_placeid->num_rows > 0){ 
                    $place_id = $row_place->id;
                }
                else {
                    $place_id = 9;
                }
      
                // check to see if there is multiple same id 
                $checkmultiple_id = $conn-> query("SELECT idcard FROM outside WHERE idcard = '$filter_idnumber'");
                $check_multi = $checkmultiple_id -> num_rows;
 
                if($check_multi === 0) {
                $insert_pass = $conn -> prepare("INSERT INTO outside(user_id, whereto, place_id, idcard, outdate) VALUES (?, ?, ?, ?, NOW())");
                $insert_pass -> bind_param('isii', $user_id,  $filter_whereto, $place_id, $filter_idnumber);

                $insert_record = $conn -> prepare("INSERT INTO totalstats(user_id, idnumber, checkoutto, checkintime, checkouttime) VALUES (?, ?, ?, ?, NOW())");
                $insert_record -> bind_param('iiss', $user_id, $filter_idnumber, $filter_whereto, $checkout_time);


                if($insert_pass -> execute() && $insert_record -> execute()){
                    echo 1;
                }
                else {
                    // if the pass_insert fails
                    echo "Error".  $insert_pass  . "<br>". $conn->error;
                }
            }
            else {
                // The id already exist 
                echo "Id already exist.";
            }
             $conn -> close();
          }
      }
    }

    function checkin(){
        require_once("connect.php");
        require_once("securityfiles/security.php");

       $now = new DateTime();
       $now->setTimezone(new DateTimeZone('America/Los_Angeles'));
      // echo $now->format('Y-m-d H:i:s T');

        if(isset($_POST['userCheckin'])){
            if(isset($_POST['studentid'])){
                $filter_idnum = escape($_POST['studentid']);
                 date_default_timezone_set('America/Los_Angeles'); 

                if(!empty($filter_idnum)){
                    $delete_idnum = $conn -> query("DELETE FROM outside WHERE idcard = '$filter_idnum'");
                    $updateTotalStats = $conn -> query("UPDATE totalstats SET checkintime=NOW() WHERE idnumber= '$filter_idnum'");
                   
                    if ($delete_idnum && $updateTotalStats) {
                        echo 1;
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                }
                else {
                    // the id number is empty 
                }
            }
        }
    }

?>