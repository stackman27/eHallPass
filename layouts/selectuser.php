<?php 
    if (!isset ($_SESSION)) session_start(); 
    
     $linkdot;

    $email_user = escape($_SESSION['sees_user']);

    $select_userid = $conn -> query("SELECT * FROM users WHERE email = '$email_user'");    
    $sel_userid = $select_userid -> fetch_object();

    $user_fullname = $sel_userid->fullname;
    $user_email = $sel_userid->email;

    $user_id = $sel_userid->user_id;  // this will allows us to filter the users data

?>