 <?php
 require_once("connect.php");
 require_once("securityfiles/security.php");
 require_once("securityfiles/datafilter.php");

 if(isset($_POST['insert_user'])){
 if(isset($_POST['fullname'], $_POST['email'], $_POST['password'], $_POST['conf_password'])) {

    $filter_fullname = escape(strtolower($_POST['fullname']));
    $filter_email =    escape(strtolower($_POST['email']));
    $filter_password = escape($_POST['password']);
    $filter_confpass = escape($_POST['conf_password']);
    $filter_hash = '';
 
    if($filter_fullname == '' && $filter_email == '' && $filter_password == '' && $filter_confpass == ''){
        // Check if everything is inserted
         echo "Please input all the fields";
    }

    else if(strlen(trim($filter_fullname)) == 0 || strlen(trim($filter_email)) == 0 || strlen(trim($filter_password)) == 0 ||  strlen(trim($filter_confpass)) == 0  ){
    // Check the whitespace in the textbox
    echo "Please no whitespaces.";
    }

    else if (!filter_var($filter_email, FILTER_VALIDATE_EMAIL)) {
        // Check if the email address is true or false
        echo "Invalid Email Address.";
    }
    
    else if($filter_password != $filter_confpass){
        // Check if the passwords match
        echo "The password doesnot match.";
    }
    
    else {
        $u_Checker = $conn -> query("SELECT  email FROM users WHERE email = '$filter_email'");
        if($u_Checker -> num_rows == 0) {
        $encrypt_pass = password_hash($filter_password, PASSWORD_DEFAULT); // More secure password with hashing 
        
                    $insert_user = $conn->prepare("INSERT INTO users(fullname, email, password, created_date) VALUES (?, ?, ?, NOW())");
                    $insert_user -> bind_param('sss', $filter_fullname, $filter_email, $encrypt_pass);
        
                    if($insert_user->execute()){ 
                          echo 1; 
                    }
                    else {
                        // if the insert user fails
                        echo "Error".  $insert_user . "<br>". $conn->error;
                    }
        
                $conn ->close();
           }
           else {
               // The fulname && email already exist
            echo "The Email Address already exist";
        }
  
        }
      }
    }
    else {
        // if else the insert user is not set to 1 in ajax
    }
 ?>