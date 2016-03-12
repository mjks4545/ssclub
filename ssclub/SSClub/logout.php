<?php
		 require_once('function.php'); 

			session_start();
			$uid=$_SESSION['u_id'];
			$offset = 5;
    		$timestamp = time() + ( $offset * 60 * 60 );
     		$time=gmstrftime("%b %d %Y %H:%M:%S", $timestamp) . "\n";
			 $date=date('Y-m-d h:i A',strtotime($time));
		
			mysql_query("insert into `logs` values('','$date','$uid','Logout','')") or die();
		
			
		
			session_destroy();
			
			
			header("Location:login.php");


?>