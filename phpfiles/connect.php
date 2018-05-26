<?php
   $servername = "localhost";
   $username = "root";
   $password = "Code1001";
   $db_name = "ehallpass";

   // Create connection 
   $conn = new mysqli($servername, $username, $password, $db_name);

   // Check connection 
   if($conn -> connect_error){
       die("Connection Failed: " . $conn->connect_error);
   }
   
  // echo "Connected Successfully";
?>