<?php
				session_start();
				
			if(isset($_SESSION['u_id']) && isset($_SESSION['Role']))
				{
					$uid=$_SESSION['u_id'];
					$role=$_SESSION['Role'];
					
					
				
				}else{
					
					header("Location:login.php?msg='Please login first'");
					
					}






?>