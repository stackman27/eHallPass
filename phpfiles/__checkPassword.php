<?php 
require_once("connect.php");

     if(isset($_GET['enterUser'])){
         if(isset($_GET['cPass']) && isset($_GET['cEmail'])){
              $corrPass = $_GET['cPass']; // the password that user entered 
              $corrEmail = $_GET['cEmail'];
             
              if($corrPass != ""){
                
                $select_pass = $conn -> query("SELECT * FROM users WHERE email = '$corrEmail'");
                $row_result = $select_pass->fetch_assoc();
                $num_user = mysqli_num_rows($select_pass);
                $hash_pwd = $row_result['password']; // hashed passsword

                $hash = password_verify($corrPass, $hash_pwd);

                if($hash === false){
                    echo "Incorrect Password";
                }
                else {
                   // "myaccount.php?date=<?php  echo date("Y-m-d", strtotime("0 days"));
                   session_start();
                   $_SESSION['access_user'] = $hash;
                  echo 1; 
                }

              } else {
                  echo "Please enter your Password";
              }
         }
     }
?>