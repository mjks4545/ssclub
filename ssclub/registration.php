<?php 
	 require_once('function.php');

	if (isset($_POST['submit']))
	{
	 	$username=$_POST['username'];	
	 	$cnic=" ";
	 	$contact=" ";
	 	$role=$_POST['role'];
	 	$password=$_POST['password'];
		$confirm=$_POST['confirm'];
	 
	 	if($username!="" && $cnic!="" && $contact!="" && $role!="" && $password!="")
			{
			if($password==$confirm)
			{
	 			mysql_query("INSERT INTO `registration` VALUES ('','$username','$cnic','$contact','$password','$role')");
	 		}
			
			}
		
		 header("Location:login.php?msg=Account Created Successfully");
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
          <img src="img/logo.png" alt="logo" class="center" />
      </div>
       
      <!-- END LOGO -->
  </div>
  


  <!-- BEGIN LOGIN -->
  <div align="center" style="color:#06C;font-size:20px;margin:20px;"><a href="login.php">Login</a></div>
  <div style=" color:#000; padding-top:30px;" align="center"> <h4>User Registration</h4>
<form action="" method="post">
	<table width="520" height="303" align="center" border="1">
    <tr align="center">
    <td width="237" height="34"><strong>User Name:</strong></td>
    <td width="267"><input type="text" name="username" required></td>
    </tr>
    
    <tr  align="center">
       <td height="35"><strong>Enter Password:</strong></td>
    <td>
      <input type="password" name="password" id="textfield" required /></td>
    </tr>
    <tr  align="center">
       <td height="35"><strong>Confirm Password:</strong></td>
    <td>
      <input type="password" name="confirm" id="textfield" required/></td>
    </tr>
     <tr  align="center">
       <td><strong>Select Role:</strong></td>
    <td><select name="role" >
      <option value="">---Select Role---</option>
      <option value="administrator">Administrator</option>
       <option value="admin2">Admin2</option>
      <option value="operator">Operator</option>
    </select></td>
    </tr>
       <td height="65" colspan="2" align="center"><input type="submit"  class="btn btn-large btn-primary" value="Create User" name="submit">
       </td>
    </table>
</form>
</div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
<div id="login-copyright">
      2014 &copy; SS SHOOTING Club.
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