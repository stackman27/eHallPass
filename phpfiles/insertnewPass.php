<?php 
require_once("connect.php");
require_once("securityfiles/security.php");
require_once("../layouts/selectuser.php");

    $target_dir = "../images/passes/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image


if(isset($_POST['createPass'])) {
    if(!empty($_POST['cr_Pass'])){

        $pass = escape($_POST['cr_Pass']);
        $userPassid = $user_id;
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        $filename = basename($_FILES["fileToUpload"]["name"]);

        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
               
            $insertPass = $conn -> prepare("INSERT INTO places(user_id, place, image, created_at) VALUES (?, ?, ?, NOW())");
            $insertPass -> bind_param('iss', $userPassid, $pass, $filename);
        
            if($insertPass -> execute()){
                header("Location: ../mypasses.php");
            }
            
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        
    }

    else {

    }

    $conn->close();
}

   
?>