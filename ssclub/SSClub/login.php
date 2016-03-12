s<?php 
	 require_once('function.php');
	
	if(isset($_POST['submit']))
		{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		
		$sql=mysql_query("SELECT * FROM `registration` WHERE `username`='$username' and `password`='$password'");
		$count=mysql_num_rows($sql);
		
		if($count>0)
		{
			$row=mysql_fetch_array($sql);
			session_start();
			$_SESSION['u_id']=$row['u_id'];
			$_SESSION['Role']=$row['Role'];
			$uid=$_SESSION['u_id'];
			
			 if(isset($uid))
			{
			// set date time to local time 
			$offset = 5;
    		$timestamp = time() + ( $offset * 60 * 60 );
     		$time=gmstrftime("%b %d %Y %H:%M:%S", $timestamp) . "\n";
			 $date=date('Y-m-d h:i A',strtotime($time));
			mysql_query("insert into `logs` values ('','$date','$uid','Login','')") or die();
		}
			
			
			
			header("Location:mainpage.php?msg=Welcome To SS CLUB");
				
		}
		else{
				header("Location:login.php?msg=Username or Password is incorrect.<br/> Please try again");
			
			}
		
		}

?>
<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.2
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Login page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/style_responsive.css" rel="stylesheet" />
  <link href="css/style_default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="login-body">
  <div class="login-header">
      <!-- BEGIN LOGO -->
      <div id="logo" class="center">
          <img src="img/logo.png" alt="logo" class="center"/>
      </div>
      <!-- END LOGO -->
  </div>


  <!-- BEGIN LOGIN -->
  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form id="loginform" class="form-vertical no-padding no-margin" action="" method="post">
      <div class="lock">
          <i class="icon-lock"></i>
      </div>
      <div class="control-wrap">
          <h4>User Login</h4>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-user"></i></span><input id="input-username" type="text" placeholder="Username" name="username" />
                  </div>
              </div>
          </div>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-key"></i></span><input id="input-password" type="password" placeholder="Password" name="password" />
                  </div>
                  <div class="mtop10">
                      <div class="block-hint pull-left small">
                          <a href="registration.php" style="font-size:12px;">Create new user</a>
                          
                      </div>
                     
                      <div class="block-hint pull-right">
                          <a href="javascript:;" class="" id="forget-password"></a>
                     
                      </div>
                  </div>

                  <div class="clearfix space5"></div>
              </div>
          </div>
      </div>

      <input type="submit" name="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />
       <div align="center" style="color:#F00; font-size:18px; height:30px;">
 <?php if(isset($_GET['msg'])){echo $_GET['msg'];}?>
 </div>
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgotform" class="form-vertical no-padding no-margin hide" method="post" action="">
      <p class="center">Enter your e-mail address below to reset your password.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" type="text" placeholder="Email"  />
          </div>
        </div>
        <div class="space20"></div>
      </div>
      <input type="button" id="forget-btn" name="submit" class="btn btn-block login-btn" value="Submit" />
    </form>
    <!-- END FORGOT PASSWORD FORM -->
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
      2014 &copy; SS SHOOTING CLUB.
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="js/jquery-1.8.3.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery.blockui.js"></script>
  <script src="js/scripts.js"></script>
  <script>
    jQuery(document).ready(function() {     
      App.initLogin();
    });
  </script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>