<?php
 date_default_timezone_set('America/Los_Angeles'); 
session_start();


//error_reporting(0); /// if you donot want user to see the error
error_reporting(E_ALL); // to display all the errors
ini_set('display_error', 'On'); 

// if the user is not register or in acrivity; We are doing Redirection 
if(!isset($_SESSION["sees_user"])){
    header("location: index.php");
  }
  else {
      
    require_once("phpfiles/connect.php");
    require_once("phpfiles/securityfiles/security.php");
    
    require_once("layouts/selectuser.php");
 
?>

 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title> eHallPass </title>
    <?php require_once( "layouts/headlinks.php");?>
    <link rel="stylesheet" media="all" href="css/index.css">

        <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-89453744-4"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-89453744-4');
    </script>
</head>

<body style="background-image:url(images/background.jpg)">
    <?php require_once("layouts/navbar.php");?>

    <div class="container wrapper" style = "height: auto; overflow: hidden;">
        <!--<h2><b>Menu</b></h2> -->
        <ul class="nav nav-tabs" style="margin: 10px;">
            <li class = "active">
                <a href="#_a" data-toggle="tab">
                    <h5> Passes </h5>
                </a>
            </li>
            <?php $select_nulstd=$conn -> query("SELECT id FROM outside WHERE user_id = '$user_id'"); $number_std = $select_nulstd->num_rows; ?>
            <li>
                <a href="#_aa" data-toggle="tab">
                    <h5> Outside <b>[<?php echo $number_std;?>] </b> </h5>
                </a>
            </li>
        </ul>

        <div class="tab-content clearfix" style = 'height: auto; overflow: hidden;'>
            <div class="tab-pane active" id="_a">
                <div class="container">
                    <div class="col-md-offset-3">
                        <h1 id="currtime"></h1>
                        <h4 id="currday"></h4>
                    </div>

                    <br/>
                    <br/> 

                    <div class = "container btnpass" style = " height: auto; overflow: hidden; margin: 0; padding: 0;">  
                        <div class="row" style = "margin: 0; padding: 0;   "> 
                            <?php // display the list of hall passes 
                               require( 'layouts/__hallpasses.php'); 
                            ?>   
                    </div>

                    </div> 
                </div>
            </div>
 
            <div class="tab-pane fade" id="_aa">
                <br/>
                <div class="container-fluid" id="id_stdOutside">
                    <!-- Where all the students who are outside will be shown -->
                </div>
                <br/>
            </div> 
        </div>  
    </div>
    
    <?php require_once("layouts/__popups.php");?>

<script>
 // Check the password to go to myaccount
$('#subPass').click(function (){
    var userPass = $('#usr_password').val();
    var userEmail = '<?php echo $user_email;?>'
  
  enterPassword(userEmail,userPass); 
});

 // To submit the password on keyboard Enter Press
$('#usr_password').keypress(function(e){
      if(e.keyCode==13)
     $('#subPass').click();
});


// Check password to enter myaccount.php
function enterPassword(userEmail, userPass){
  var today_date = '<?php echo date("Y-m-d", strtotime("0 days")); ?>';
  $.ajax({
       type: 'GET',
       url: 'phpfiles/__checkPassword.php',
       data:{
        'enterUser': 1, 
        'cPass': userPass,
        'cEmail': userEmail,
       },
       success:function(data){
          if(data == 1){  
             window.location.href = 'myaccount.php?date='+today_date;
          } else {
            $('#error_msg').text(data); 
            $('#usr_password').val('');
          }
       }
    });
}


/* function activaTab(tab){ // to make sure that Places tab is active on load
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
}; */

 
</script>
 
 
<?php  require_once("phpfiles/__enteridconfig.php");?>

<script type="text/javascript" src = "js/__index.js"></script> <!-- to change the text focus in enter id txtbox when max has reached -->
<script type="text/javascript" src = "js/__clock.js"></script> <!-- to display the time in real time -->
<!--<script type="text/javascript" src = "js/__enteridconfig.js"></script>   IMP *** to check if the txtbox config and call function goout -->
<script type="text/javascript" src="js/__gooutuser.js"></script> <!-- IMP ** calls goout() and checkin() to register checkout and checkin -->
<script type="text/javascript" src="js/__stdoutandcheckin.js"></script> <!-- gives the students who are outside ***** ALSO INCLUDES CHECKIN FUNCTION() ****-->
  
 
    </body>
    </html>
<?php
}
 ?>