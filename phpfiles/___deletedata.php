<?php 
    require_once("connect.php");
    require_once("securityfiles/security.php");

    if(isset($_GET['did']) && isset($_GET['id']) && isset($_GET['loc'])){
        $delData = escape($_GET['did']);
        $org_id = escape($_GET['id']);
        $locationRedirect = escape($_GET['loc']);
        $historyDate = $_GET['acdate'];
    
        if($delData !== '' && $org_id !== ''){ 
                // Delete Data 
                $delete_Data = $conn->query("DELETE FROM totalstats WHERE  totalstats.id='$org_id' AND idnumber = '$delData'"); 

                if($conn->query($delete_Data) === TRUE){ 
                    if($locationRedirect == 'ma'){
                        header("location: ../myaccount.php?date=$historyDate");
                        die;
                    }
                    else if($locationRedirect == 'ha'){
                        header("location: ../history.php?date=$historyDate");
                        die;
                    } 
            } else {
                if($locationRedirect == 'ma'){
                    header("location: ../myaccount.php?date=$historyDate");
                    die;
                }
                else if($locationRedirect == 'ha'){
                    header("location: ../history.php?date=$historyDate");
                   die;
                }  
          } 
          $conn->close();
        }

        else {
            // the id is blank retrieve to the home page
            header("location: home.php");
            $conn->close();
        }
    }

?>