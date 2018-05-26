 <?php	
    require_once("connect.php");
    require_once("securityfiles/security.php");
    require_once("securityfiles/cleansearch.php");
    require_once("../layouts/selectuser.php");
    
    $key = mysqli_real_escape_string($conn, $_GET['key']);
    $array = array();
 
 
    $search_idnumber = $conn -> query("SELECT idnumber,checkoutto FROM totalstats WHERE idnumber LIKE '%{$key}%' AND  user_id = '$user_id'");

    while($row = $search_idnumber -> fetch_assoc()){  
        $filter_all = html_entity_decode($row["idnumber"], ENT_COMPAT, 'UTF-8');
        //cleansearch($filter_all); 
        
       $idStudentResult[] = strip_tags(cleansearch($filter_all), "");
    }
    
    echo json_encode($idStudentResult);
 
?>

