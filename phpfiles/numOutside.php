<?php 
require_once("connect.php");
require_once("securityfiles/security.php");
require_once("../layouts/selectuser.php");


$select_nulstd=$conn -> query("SELECT id FROM outside WHERE user_id = '$user_id'"); 
$number_std = $select_nulstd->num_rows;

echo $number_std;

?>
           