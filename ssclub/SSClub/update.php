<?php 
   include("connection/conn.php");
   
   if(isset($_GET['uid']))
   {
	   $uid=$_GET['uid'];
	   $abc=mysql_query("UPDATE `registration` SET `Status`='Active' WHERE `u_id`='$uid'");
	   header("Location:index.php?page=admin");
	   }
?>