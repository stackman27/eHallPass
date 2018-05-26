 <nav class="navbar navbar-inverse" style = "padding: 0px; border-radius: 0px;min-width: 605px;">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="true" style = "color: white;">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php" style = "font-weight: 600; font-size: 28px;">eHallPass</a>
      </div>
  
      <div class="navbar-collapse collapse out" id="bs-example-navbar-collapse-2" aria-expanded="true" style="">
        <ul class="nav navbar-nav navbar-right">
           
          <li class = "dropdown" style  = "margin-right: 20px;">
           <li data-toggle="modal" data-target="#myModalgotoAcc" > <a> My Account</a> </li>
           <li>  <a href = "phpfiles/logout.php"> Log Out</a></li> 
  
                <a href="#" class = "dropdown-toggle" data-toggle = "dropdown"> 
                  <span class="glyphicon glyphicon-user" style = "color: white; border: 1px solid white; border-radius: 100px; padding: 10px; margin-top: 10px; font-size: 18px;">
               </span> </a>
 
                <ul class = "dropdown-menu" style = "width: 250px; margin-right: 30px;"> 
                  <li>
                     <div class = "row">
                       <div class = "col-md-4">
                         <img src="" alt="" style = "color: white; border: 1px solid white; border-radius: 100px; padding: 10px; font-size: 18px;">
                       </div>
  
                        <div class = "col-md-8" style = "line-height: 10px;">
                          <h4><b><?php echo ucfirst($user_fullname); ?></b></h4>
                          <p><?php echo $user_email;?></p>
                        </div>
  
                     </div>
                  </li>
                  <hr>
                  <div class = "row" style = "  width: 100%;margin: 0; padding: 0">
                      <li style = "width: 100%; text-align: center;" data-toggle="modal" data-target="#myModalgotoAcc"><button class = "btn btn-primary" type = "button">My Account</button> &nbsp; &nbsp; 
                      <a class = "btn btn-primary" href = "phpfiles/logout.php">  Log Out  </a></li>  
                  </div>
                   <br/>
                </ul>
              </li>
        </ul>
      </div>
    </div>
  </nav>
  