<?php 

require_once("connect.php");
require_once("securityfiles/security.php");
require_once("securityfiles/datafilter.php");

if(isset($_GET['insert_login'])){
    if(isset($_GET['login_email'], $_GET['login_password'])){

         $filter_lemail = escape($_GET['login_email']);
         $filter_lpassword = escape($_GET['login_password']);

         //echo $filter_lemail.' || '. $filter_lpassword;
         
         if(!empty($filter_lemail) && !empty($filter_lpassword)){

             $select_pass = $conn -> query("SELECT * FROM users WHERE email = '$filter_lemail'");
             $row_result = $select_pass->fetch_assoc();
             $num_user = mysqli_num_rows($select_pass);
             $hash_pwd = $row_result['password'];

             $hash = password_verify($filter_lpassword, $hash_pwd);

                if($hash === false || $num_user === 0){
                    echo "Incorrect Email or password";
                }
                else {
                    $POSTUser_query = $conn -> query("SELECT email, password FROM users WHERE email = '$filter_lemail' AND password = '$hash_pwd'");
                    $row_users = $POSTUser_query -> fetch_object(); // retrieving via OOP
    
                    $dbemail = escape(strtolower($row_users->email));
                    $dbpassword = escape($row_users->password);
    
                    if($filter_lemail == $dbemail && $hash_pwd == $dbpassword){
                        session_start();
                        $_SESSION['sees_user'] = $filter_lemail;
                      
                        echo 1;
                    }
                    else {
                       echo "Failed to login";
                    }
                    $POSTUser_query->close();
                }
             
         }

    }
}

?>