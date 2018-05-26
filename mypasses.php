<?php 
session_start(); 
//error_reporting(0); // if you donot want user to see the error 
error_reporting(E_ALL); // to display all the errors 
ini_set( 'display_error', 'On'); 
require_once( "phpfiles/connect.php"); 
require_once( "phpfiles/securityfiles/security.php"); 
require_once( "layouts/selectuser.php"); // if the user is not register or in acrivity; We are doing Redirection 

if(!isset($_SESSION["sees_user"]) || !isset($_SESSION[ 'access_user']))
{ header( "location: home.php"); }
 else { ?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title> eHallPass </title>
        <?php require_once( "layouts/headlinks.php");?>
        <link rel="stylesheet" href="css/myaccount.css">
        <link rel="stylesheet" href="css/searchidnum.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="js/typeahead.min.js"></script>
</head>


<body style="background-image:url(images/background.jpg)">
    <?php require_once( "layouts/navbar.php");?>

    <div class="container-fluid">
            <div class="row">
                <div class="col-md-3" id="uProfile">
                    <div class="container-fluid" style="padding: 0; margin:0;">
                        <div class="panel panel-default" style="width: 95%; margin: 10px; padding: 0;">
                             <div class="panel-heading">
                                <h3><b><?php echo ucfirst($user_fullname); ?></b></h3>
                                <h5><?php echo $user_email;?></h5>
                            </div>
                            
                            <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked" style="">
                                    <li><a href="home.php" style="border-radius: 0px;">Home</a>
                                    </li>
                                    <li class="active"><a href="#" style="border-radius: 0px;">My Account</a>
                                    </li>
                                    <li><a href="mypasses.php" style="border-radius: 0px;">My Passes</a>
                                    </li>
                                    <li data-toggle="modal" data-target="#editProfile" ><a href="#" style="border-radius: 0px;">Settings</a>
                                    </li>
                                    <li><a href="#" style="border-radius: 0px;">Support</a>
                                    </li>
                                    <li><a href="phpfiles/logout.php" style="border-radius: 0px;">Log Out</a>
                                    </li>
                                </ul>
                            </div> 
                        </div>
                    </div>
                </div>
    
                <div class="col-md-9 wrapallDate" >
                        <?php require_once("layouts/__createPass.php");?> 
                        <?php require_once("layouts/__popups.php");?>
                </div>
            </div>
        </div>
       
</body>

</html>

<?php } ?> 