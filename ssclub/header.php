<script type="text/javascript" src="js/jquery.horizontalNav.min.js"></script>   

<!-- JavaScript Test Zone -->
  <script>
  $(document).ready(function() {
    $('.full-width').horizontalNav();
  });
  </script>
  
            <nav class="horizontal-nav full-width">
                <ul type="none" style="margin-left: 0px;">
                <li><a href="index.php?page=searchid">Check In</a></li>
                <li><a href="index.php?page=booths">Booths</a></li>
                <?php if($_SESSION['Role']=="administrator"){ ?>
                <!--
                <li><a href="index.php?page=logsactivity">Logs Activity</a></li>
                -->
                <?php } ?>
                <li><a href="index.php?page=membership">Membership Form</a></li>
                <li><a href="index.php?page=membersearch">Search Member</a></li>
                <li><a href="index.php?page=advancesearch">Advance Search</a></li>
                
              </ul>
            </nav>
  <nav class="horizontal-nav full-width">
      <ul type="none" style="margin-left: 435px;">
        
        <?php 
				if($_SESSION['Role']!="opertor" && $_SESSION['Role']!="admin2")
				{	
				?>
        <li><a href="http://localhost/SSClub/store.php">Show Room</a></li>  
                                <?php }?>
    <?php if(isset($_SESSION['u_id']))
        {?>
        <li><a href="logout.php">Log Out</a></li><?php }else{ ?>
        <li><a href="login.php">Log In</a></li><?php }?>
      </ul>
  </nav>


