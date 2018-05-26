function getstdsout(){    
    $.ajax({
        type: 'GET',
        url: 'layouts/__stdsoutside.php',

        success:function(data){ 
            
            $('#id_stdOutside').html(data);  
        },   
    });

 } 


function callCheckin(id_number) {

    $('#checkinIdnum').text(id_number);
    $('#makeSureCheckin').modal('show');

    $('#checkinSuccess').click(function() {
        checkin(id_number);
    });
}

  getstdsout();   
