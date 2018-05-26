 
<!-- Modal Enter Id number-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style = "background: #eee;">
       <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->                
        <h4 class="modal-title"><b>eHallPass | <span id = "info_pass"></span></b></h4>
      </div>
 
      <div class="modal-body">
        <div style=" width: 100%; text-align: center;" class="container">  
 
        <br/>

        <h4>Please Enter Your Id Number</h4>
         <div class = "containertxtbox" id = "cont_txtbox">
           <input type="number"  class = "1" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  maxlength="1" autofocus required>
           <input type="number"  class = "1"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="1" required>
           <input type="number"  class = "1"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'  maxlength="1" required>
           <input type="number"  class = "1"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="1" required>
           <input type="number"  class = "1"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="1" required>
        </div>
       
        <br/>
          <!--<button type="button" class="btn btn-success btn-lg" id = "checkout" data-dismiss="modal"  data-toggle="modal" data-target="#myModal_cc" style = "padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 10px;">Checkout</button>
          --> 
            <button type="button" class="btn btn-success btn-lg checkoutbtn" id = "checkout" style = "padding: 18px 120px 18px;">Checkout</button> 
        </div>
      </div>
      
       <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>

<div id="myModalOther" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style = "background: #eee;">
       <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->                
        <h4 class="modal-title"><b>eHallPass | <span id = "info_pass">Other</span></b></h4>
      </div>
 
      <div class="modal-body">
        <div style=" width: 100%; text-align: center;" class="container">  

        <input type="text" placeholder = "Enter the place" class="form-control" id = "otherWhere" required/>    
 
        <br/>
        
        <h4>Please Enter Your Id Number</h4>
         <div class = "containertxtbox" id = "cont_txtboxOther">
           <input type="number"  class = "1" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  maxlength="1" autofocus required>
           <input type="number"  class = "1"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="1" required>
           <input type="number"  class = "1"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'  maxlength="1" required>
           <input type="number"  class = "1"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="1" required>
           <input type="number"  class = "1"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="1" required>
        </div>
        
        <br/>
          <!--<button type="button" class="btn btn-success btn-lg" id = "checkout" data-dismiss="modal"  data-toggle="modal" data-target="#myModal_cc" style = "padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 10px;">Checkout</button>
          --> 
            <button type="button" class="btn btn-success btn-lg checkoutbtn" id = "checkoutOth" style = "padding: 18px 120px 18px;">Checkout</button> 
        </div>
      </div>
      
       <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>




<!-- Modal  Checkout Successful-->
<div id="myModal_cc" class="modal fade bd-example-modal-sm" role="dialog" >
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <br/>
          <div class ="container" style=" width: 100%; text-align: center;">
            <img src="images/checkout.jpg" alt="Checkout" style = "height: 75px; width: 77px;">
          <h4> Checkout Successful </h4>
        </div>
      </div>
       <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>
 
 

  <!-- Modal Enter Password Again-->
<div id="myModalgotoAcc" class="modal fade bd-example-modal-sm" role="dialog" >
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header" style = "background: #eee;">
              <!--<button type="button" class="close" data-dismiss="modal">&times;</button> -->       
              <h4 class="modal-title"><b>eHallPass</b></h4>
            </div>
              <br/>

        <div class="modal-body">
            <div class ="container" style=" float: left; width: 100%;">
                <div class="form-group">
                  <p style = "color: red; font-size: 18px;" id = "error_msg" ></p>
                    <label for="usr_password" style = "font-size: 14px;">Please Enter your Password:</label>
                    <input type="password" class="form-control" id="usr_password" name = 'usr_password' autofocus/>
                  </div> 
                  <br/> 
                   <button class = "btn btn-primary btn-lg"  type = "button" id = "subPass" name = 'subPass'>Submit</button> 
                  <br/>  <br/>
          </div>
        </div>
         <div class="modal-footer">
          <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
  </div>

 
    <!-- Modal For Checkin -->
    <div id="makeSureCheckin" class="modal fade bd-example-modal-sm" role="dialog" >
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style = "background: #eee;">
                <!--<button type="button" class="close" data-dismiss="modal">&times;</button> -->       
                <h4 class="modal-title"><b>eHallPass</b> | <span id = "checkinIdnum">  </span></h4>
        </div>
                <br/>
    
          <div class="modal-body">
              <div class ="container" style= "width: 100%; text-align:center;">
                  <div class="form-group">
                    <h4><b>Are you sure you want to Check in? </b></h4>
                    </div> 
                    <br/>
              <button class = "btn btn-success btn-lg"  type = "button" id = "checkinSuccess" style = "padding: 20px 80px 20px; margin: 13px;font-size: 21px;">Yes</button>
              <button class = "btn btn-danger btn-lg"  type = "button" data-dismiss="modal" style = "padding: 20px 80px 20px; margin: 13px; font-size: 21px;">No</button>
                  
            </div>
          </div>
           <div class="modal-footer">
            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          </div>
        </div>
      </div>
    </div>


<!-- Create Pass popup -->
<div id="myModal_ccPass" class="modal fade bd-example-modal-sm" role="dialog" >
      <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header" style = "background: #eee;">
              <!--<button type="button" class="close" data-dismiss="modal">&times;</button> -->       
              <h4 class="modal-title"><b>eHallPass</b> | Create Pass</h4>
      </div>
              <br/>
 
        <div class="modal-body">
           <div class ="container" style= "width: 100%; text-align:left;">
            
           <form action="phpfiles/insertnewPass.php" method="post" enctype="multipart/form-data"> 
            <label for="cr_Pass"> <h5> Pass Title: </h5></label>
            <input type="text" class="form-control" id = "cr_Pass" name = "cr_Pass" required>
              <br/>

              <label for="cr_Passimg"><h5> Insert an image: </h5></label> <br/>
              <input id="fileUpload" name="fileToUpload" type="file" id = "cr_Passimg" name="cr_Passimg"/> 

              <br/> <br/>
 

              <input type = "submit" class = "btn btn-primary btn-lg"  type = "button" id = "createPass" name = "createPass" value = "Create Pass"/>        
          </form>

        </div>
        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      </div>
</div>


 