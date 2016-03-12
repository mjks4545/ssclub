<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="mainpage.php" id="noPrint">
				     <img src="img/logo.png" alt="Admin Lab" />
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="arrow"></span>
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<div id="top_menu" class="nav notify-row">
                    <!-- BEGIN NOTIFICATION -->
					<ul class="nav top-menu">
                        <!-- BEGIN SETTINGS -->
                     
                        
                        
                        <!-- END SETTINGS -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <ul class="sidebar-menu" id="noPrint">
				 			<li><a href="index.php?page=searchid">Check in</a></li>
                            <li><a href="index.php?page=booths">Booths</a></li>
                    		 <?php if($_SESSION['Role']=="administrator"){ ?> <li><a href="index.php?page=logsactivity">Logs Activity</a></li><?php }?>
                            
                              <li><a href="index.php?page=membership">Membership Form</a></li>
                              <li><a href="index.php?page=membersearch">Search Member</a></li>
                        
                            
                       		
                         	
                        <!-- END INBOX DROPDOWN -->
						<!-- BEGIN NOTIFICATION DROPDOWN -->
						
							</ul>
						</li>
						<!-- END NOTIFICATION DROPDOWN -->

					</ul>
                  
                   
                <h4  style="color:white;margin-top:1px;padding-left:10px;float:left;" id="noPrint"><a href="index.php?page=advancesearch">Advance Search <img height="20x" width="30px" src="img/search2 (4).png" /></a></h4>
              
             <?php 
			 			if(isset($_SESSION['u_id']))
						{
			 
			 ?> <h4 style="float:right;margin-top:5px;  padding-left:120px;" id="noPrint"><a href="logout.php">LogOut</a></h4>  <?php }else{?>
             
              <h4 style="float:right; padding-top:10px;  padding-left:120px;"><a href="login.php">Login</a></h4><?php }?>
                <div class="top-nav ">
             
                </div>
                
                    <!-- END  NOTIFICATION -->
                    
                
               
					<!-- END TOP NAVIGATION MENU -->
				</div>
			</div>
		</div>