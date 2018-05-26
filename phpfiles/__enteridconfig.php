<?php
    require("connect.php");
    require_once("securityfiles/security.php");
    require("layouts/selectuser.php");
 
   
    $storePass = array();

    $select_allPass = mysqli_query($conn , "SELECT * FROM places WHERE user_id = '$user_id' OR user_id = 0");
 
     while($row = mysqli_fetch_array($select_allPass)){
         $storePass[] = escape($row['place']);
    }

   // echo json_encode($storePass);
  
?>
 
<script>
    var x = document.getElementById("cont_txtbox");
    var y = x.getElementsByTagName("INPUT");
 
    var x1 = document.getElementById("cont_txtboxOther");
    var y1 = x1.getElementsByTagName("INPUT");

    var total = [];

    var arr_passes = <?php echo json_encode($storePass);?>;
    var place;

    for (let x = 0; x < arr_passes.length; x++) {
        $('#' + arr_passes[x]).click(function() {
            $('#info_pass').text(arr_passes[x]);
 
            $('#checkout').click(function() { 
                 if (y[0].value !== '' && y[1].value !== '' && y[2].value !== '' && y[3].value !== '' && y[4].value !== '') {

                    for (var i = 0; i < y.length; i++) {
                        total.push(y[i].value);
                    }

                    total = total.join("");

                    if(total.length == 5){ 
                        goout(arr_passes[x], total); 
                    } else {
                        alert("Please enter only five digit id number.");
                        window.location.reload();                      
                    }
                   
                } else {
                    $('input[type="text"]').each(function() {
                        if ($.trim($(this).val()) == '') {

                            $(this).addClass('error');
                        } else {
                            $(this).removeClass('error');
                        }
                    });
                } 
            });   
            
            $('#checkoutOth').click(function (){
                var whereTo = document.getElementById('otherWhere').value;

                for (var i = 0; i < y1.length; i++) {
                    total.push(y1[i].value);
                }

                total = total.join("");

                if(total.length == 5 && !whereTo == ""){ 
                    goout(whereTo, total); 
                } else {
                    alert("Please enter only five digit id number OR Enter the place.");
                    window.location.reload();                      
                }
 
            });
            
            
        });
    } // end of for loop
</script>
 
 