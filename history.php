<?php session_start(); 
//error_reporting(0); // if you donot want user to see the error 
error_reporting(E_ALL); // to display all the errors 
ini_set( 'display_error', 'On'); 
require_once( "phpfiles/connect.php"); 
require_once( "phpfiles/securityfiles/security.php"); 
require_once( "layouts/selectuser.php"); // if the user is not register or in acrivity; We are doing Redirection 

if(!isset($_SESSION[ "sees_user"]) || !isset($_SESSION[ 'access_user']))
{ 
    header( "location:home.php"); 
} else { ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <?php require_once( "layouts/headlinks.php");?>

    <link rel="stylesheet" href="css/searchidnum.css">
    <link rel="stylesheet" href="css/history.css">
    <script src="js/typeahead.min.js"></script>


    <script>
        $(function() {
            $('input.typeahead').typeahead({
                name: 'typeahead',
                remote: 'phpfiles/____searchdate.php?key=%QUERY',
                limit: 10,
            }); <?php
            if (isset($_GET['stdid'])) {
                $id_txt = $_GET['stdid']; ?>
                $('#searchbox').val("<?php echo htmlspecialchars($id_txt);?>"); <?php
            } ?>

            $('#searchidnum').click(function() {
                var hh = $('#searchbox').val();
                var todayDate = '<?php echo date('Y-m-d',strtotime("-0 days"));?>';
                document.getElementById("searchidnum").href = "myaccount.php?stdid=" + hh;
            });
        });
    </script>

</head>

<body style="background-image:url(images/background.jpg)">
    <?php require_once("layouts/navbar.php");?>

    <div class="container" style="margin-top: -25px; background: white;">
        <br/>
        <br/>
        <?php if($_GET['date']=='') { ?>
        <div class="col-sm-12">
            <!-- <input type="text" class="typeahead tt-query" name="typeahead" id = "searchbox" autocomplete = "off" spellcheck = "false" placeholder="Search id number" size = "50" style = " outline: 0;text-align: left;">
            --> 
            <div class="form-group has-feedback txtbox_searchDate">
                <div class="input-group col-md-12">
                    <input type="text" class="typeahead tt-query " name="typeahead" id="searchbox" autocomplete="off" spellcheck="false" placeholder="Search date" size="75">
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-md" type="button">
                        <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>

        <br/>
        <br/>
        <div class = "hisDates" > 
            <?php require_once("layouts/____historycontent.php"); ?> </div> <?php } else { ?> 
        
        <table class="table table-bordered " style="width: 98%; margin: 0 auto;"> 
            <thead>
                <tr style=" font-size: 18px;">
                    <th>Id Number</th>
                    <th>Checkout To</th>
                    <th>Check-Out Time</th>
                    <th>Check-In Time</th>
                    <th>Time Out</th>
                </tr>
            </thead>

            <tbody style="font-size: 14px;"> 
                <?php require_once("layouts/____historycontenttable.php"); ?>
                <?php } ?>
            </tbody>
        </table>
        <br/>  
    </div>
</body>
</html>

<?php } ?>