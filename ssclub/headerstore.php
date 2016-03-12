<script type="text/javascript" src="js/jquery.horizontalNav.min.js"></script>   

<!-- JavaScript Test Zone -->
  <script>
  $(document).ready(function() {
    $('.full-width').horizontalNav();
  });
  </script>
  
            <nav class="horizontal-nav full-width" id="noPrint">
                <ul type="none" style="margin-left: 0px;">
                <li><a href="store.php?page=gotosales">Sales</a></li>
                <li><a href="store.php?page=gotopurchase">Purchase</a></li>
                <li><a href="store.php?page=addproduct">Add Product</a></li>
                <li><a href="store.php?page=stock">Stock</a></li>
                <li><a href="store.php?page=report">Sales Reports</a></li>
                <li><a href="store.php?page=purchasereport">Purchase Reports</a></li>
                </ul>
                <ul type="none" style="margin-left: 483px;">
                <li><a href="http://localhost/SSClub/index.php">SS Shooting Club</a></li>
                <?php if(isset($_SESSION['u_id']))
						{ ?>
                                                <li><a href="logout.php">Log Out</a></li><?php }else{?>
                                                <li><a href="login.php">Log In</a></li><?php }?>
                
              </ul>
            </nav>


    
		