<?php require( "phpfiles/connect.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>eHallPass</title>

    <link rel="stylesheet" href="https://bootswatch.com/3/paper/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="css/loginRegister.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <br/>
                <br/>
                <h1 style="text-align: center; font-size: 67px;">
          <b> eHallPass </b>
        </h1>
                <br/>

                <div class="coverdiv">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active">
                            <a data-toggle="tab" href="#home" style="border-radius: 0px;">
                                <h5> Log In </h5>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#menu1" style="border-radius: 0px;">
                                <h5> Register </h5>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="formlogin">

                                <p style="color: red; font-size: 18px;" id="error_msg_login"></p>

                                <div class="form-group">
                                    <label for="email" style="font-size: 16px;">Email address:</label>
                                    <input type="email" class="form-control" id="lemail" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd" style="font-size: 16px;">Password:</label>
                                    <input type="password" class="form-control" id="lpwd" required>
                                </div>
                                <br/>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg" id="login">Log In</button>
                                </div>

                                <script>
                                    $(function() {
                                        $('#login').click(function() {
                                            let login_email = $('#lemail').val();
                                            let login_password = $('#lpwd').val();

                                            login_user(login_email, login_password);
                                        });

                                        $('#lemail').keypress(function(e) {
                                            if (e.keyCode == 13)
                                                $('#login').click();
                                        });

                                        $('#lpwd').keypress(function(e) {
                                            if (e.keyCode == 13)
                                                $('#login').click();
                                        });
                                    });
                                </script>


                                <br/>
                                <br/>
                                <br/>

                                <div class="wrapAddon">
                                    <a href="#">Forgot Password?</a>
                                    <hr style="border: 1px solid lightgray;">
                                    <h5> Don't have an account?
                    <span style="color: blue;">
                      <a data-toggle="tab" href="#menu1" style="border-radius: 0px;"> Register Now.</a>
                    </span>
                  </h5>
                                </div>

                            </div>
                        </div>
                        <!-- End Home div -->

                        <div id="menu1" class="tab-pane fade">

                            <div class="formRegister">

                                <p style="color: red; font-size: 18px;" id="error_msg"></p>

                                <div class="form-group">
                                    <label for="fullname" style="font-size: 16px;">Full Name:</label>
                                    <input type="text" class="form-control errors" id="fullname">
                                </div>
                                <div class="form-group">
                                    <label for="email" style="font-size: 16px;">Email:</label>
                                    <input type="email" class="form-control" id="uemail">
                                </div>

                                <div class="form-group">
                                    <label for="password" style="font-size: 16px;">Password:</label>
                                    <input type="password" class="form-control" id="password">
                                </div>
                                <div class="form-group">
                                    <label for="conf_password" style="font-size: 16px;">Confirm Password:</label>
                                    <input type="password" class="form-control" id="conf_password">
                                </div>

                                <br/>
                                <div class="col-md-12">
                                    <button type="submit" id="register_user" class="btn btn-block btn-primary btn-lg">Register</button>
                                </div>

                                <?php //require_once( "phpfiles/loginRegister.php"); ?>

                                <script>
                                    $(function() {
                                        let arr = ['fullname', 'uemail', 'password', 'conf_password'];
                                        $('#register_user').click(function() {
                                            let ufullname = $('#fullname').val();
                                            let uemail = $('#uemail').val();
                                            let upass = $('#password').val();
                                            let uconf_pass = $('#conf_password').val();

                                            ins_user(ufullname, uemail, upass, uconf_pass);
                                        });

                                        for (let index = 0; index < arr.length; index++) {
                                            $('#' + arr[index]).keypress(function(e) {
                                                if (e.keyCode == 13)
                                                    $('#register_user').click();
                                            });
                                        }
                                    });
                                </script>

                                <br/>
                                <br/>
                                <br/>

                                <div class="wrapAddon">
                                    <p>By registering, you agree to the
                                        <a> privacy policy </a> and
                                        <a> terms of service. </a>
                                    </p>

                                    <hr style="border: 1px solid lightgray;">
                                    <h5> Already have an account?
                                    <span style="color: blue;">
                                    <a data-toggle="tab" href="#home" style="border-radius: 0px;">Sign In</a>
                                    </span>
                                </h5>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end tab Content -->
                </div>
            </div>

            <div class="col-md-8">
                <div class="img" style=" text-align: center; margin: 25px;">
                    &nbsp; &nbsp; &nbsp;
                    <img src="images/hallpass.jpg" alt="" style="width: 80%;">
                </div>
            </div>
        </div>
    </div>
 
    <?php $message="Successfully Registered!" ; require_once( "layouts/_successModel.php"); // popup for informing user insert ?>

    <script src="js/_emailvalidation.js"></script>
    <script src="js/_insertuser.js"></script>

</body>

</html>