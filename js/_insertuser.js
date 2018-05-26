function ins_user(ufname, uemail, upass, uconf_pass){
    let n_ufname = ufname;
    let n_uemail = uemail;
    let n_upass = upass; 
    let n_uconf_pass = uconf_pass;

    $.ajax({
        type: 'POST',
        url: 'phpfiles/_loginRegister.php',
        data: {
            'insert_user': 1,
            'fullname': n_ufname,
            'email': n_uemail,
            'password': n_upass,
            'conf_password': n_uconf_pass
        },

        success:function(data){
         if(data == 1){
            $('#myModal_cc').modal('show');
        
            setTimeout(function(d){
              window.location.reload();
             }, 2000); 
         }

         else {
          $('#error_msg').text(data);
         }
        }
    });
}

function login_user(email, password){
    let n_lemail = email;
    let n_lpassword = password;
   
    $.ajax({
        type: 'GET',
        url: 'phpfiles/_loginuser.php',
        data: {
            'insert_login': 1,
            'login_email': n_lemail,
            'login_password': n_lpassword
        },

        success:function(data){
            if(data == 1){
                window.location.href="home.php";
            }
            else {
             $('#error_msg_login').text(data);
            }
        }
    });
}