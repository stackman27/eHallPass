<?php	
    require_once("../phpfiles/connect.php");
    require_once("../phpfiles/securityfiles/security.php");
    require_once("../phpfiles/securityfiles/cleansearch.php");
    require_once("selectuser.php");
    
    $key = mysqli_real_escape_string($conn, $_GET['key']);
    $array = array();
 
 
    $search_idnumber = $conn -> query("SELECT DISTINCT DATE_FORMAT(checkouttime,'%m/%d/%Y') AS niceDate FROM totalstats WHERE niceDate LIKE '%{$key}%' AND user_id = '$user_id'");
    
    while($row = $search_idnumber -> fetch_assoc()){  
        $filter_all = html_entity_decode($row->niceDate, ENT_COMPAT, 'UTF-8');
        //cleansearch($filter_all); 
        
       $idStudentResult[] = strip_tags(cleansearch($filter_all), "");
    }
    
    echo json_encode($idStudentResult);
 
?>