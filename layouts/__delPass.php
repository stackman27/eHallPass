<?php  
    require_once("../phpfiles/connect.php");
    require("../phpfiles/securityfiles/security.php");
    require_once("selectuser.php");
   

    
    $delete = escape($_GET['delKey']); 
  
    if(! empty($delete)){
       $delete_passQue = $conn->prepare("DELETE FROM places WHERE id = ? AND user_id = ?");
       $delete_passQue -> bind_param('ii', $delete, $user_id);
        
        if($delete_passQue -> execute()){
            header("location: ../mypasses.php");
            $conn->close();
        }
        else {
            header("location: ../mypasses.php");
            $conn->close();
        }

    }

?>