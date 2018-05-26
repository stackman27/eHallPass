 
function goout(u_place, uid_num) {
        let n_uplace = u_place;
        let n_uidnum = uid_num
    
        $.ajax({
            type: 'POST',
            url: 'phpfiles/__goout.php?f=out',
            data: {
                'gooutuser': 1,
                'whereto': n_uplace,
                'idnumber': n_uidnum
            },
            success: function(data) {
                if (data == 1) {
                    $('#myModal_cc').modal('show');
                    $('#myModal').modal('hide');
                    $('#myModalOther').modal('hide'); 
                    
                    setTimeout(function(d) {
                        $('#myModal_cc').modal('hide');
                        //  $('.1').val('');
                       window.location.reload();  
                        activaTab('_aa'); 
                    }, 1500);
                } else {
                    alert(data);
                }
            }
        }); 
    }
    
    function checkin(student_id) {
    
        let n_studentid = student_id;
    
        $.ajax({
            type: 'POST',
            url: 'phpfiles/__goout.php?f=in',
            data: {
                'userCheckin': 1,
                'studentid': n_studentid
            },
    
            success: function(data) {
                if (data == 1) {
                    window.location.reload();
                } else {
                    alert(data);
                }
            }
        });
    }
 