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
				 			<li><a href="store.php?page=gotosales">Sales</a></li>
                    		<li><a href="store.php?page=gotopurchase">Purchase</a></li>
                            <li><a href="store.php?page=addproduct">Add Product</a></li>
                           <li><a href="store.php?page=stock">Stock</a></li>
                       		<li><a href="store.php?page=report">Sales Reports</a></li>
                            <li><a href="store.php?page=purchasereport">Purchase Reports</a></li>
                         
                       		
                         	
                        <!-- END INBOX DROPDOWN -->
						<!-- BEGIN NOTIFICATION DROPDOWN -->
						
							</ul>
						</li>
						<!-- END NOTIFICATION DROPDOWN -->

					</ul>
                
                  
             <?php 
			 			if(isset($_SESSION['u_id']))
						{
			 
			 ?> <h4 style="float:right;padding-left:100px;margin-top:5px;" id="noPrint"><a href="logout.php">LogOut</a></h4>  <?php }else{?>
             
              <h4 style="float:right; padding-top:10px;  padding-left:120px;"><a href="login.php">Login</a></h4><?php }?>
                <div class="top-nav ">
             
                </div>
                
                    <!-- END  NOTIFICATION -->
                    
                
               
					<!-- END TOP NAVIGATION MENU -->
				</div>
			</div>
		</div>