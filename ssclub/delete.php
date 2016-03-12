<?php
		require_once("function.php");
		// prodcut delte from product tables
			if(isset($_GET['id']))
			{
				$id=$_GET['id'];
				
				$query=mysql_query("select * from `product` where `p_id`='$id'") or die(mysql_error());
				$row=mysql_fetch_array($query);
				$pname=$row['p_name'];
				$ptype=$row['p_type'];
				$pmodel=$row['pmodel'];
				
				
				$query1=mysql_query("select * from `purchase` where `product`='$pname' AND `prd_type`='$ptype' AND `pmodel`='$pmodel'") or die(mysql_error());
				$row1=mysql_fetch_array($query1);
				
				$query2=mysql_query("select * from `sales` where `Product`='$pname' AND `SubProduct`='$ptype' AND `pmodel`='$pmodel'") or die(mysql_error());
				$row2=mysql_fetch_array($query2);
				
				if($row1==0 && $row2==0)
				{
					mysql_query("delete from `product` where `p_id`='$id'") or die();
					$msg="Record Deleted Successfully";	
				
				}else
				{
					$msg="Product Can Not Deleted";
				}
					
					header("Location:store.php?page=allproduct&msg=$msg");
			}
			
			// delte record from sales_bill2
			
			if(isset($_GET['s_id']))
			{
				$sid=$_GET['s_id'];
				$id=$_GET['sid'];
				mysql_query("delete from `sale_bill2` where `bill2_id`='$sid'") or die(mysql_error());
				header("Location:store.php?page=addmoreproduct&sid=$id&msg=Record Deleted");
			}
			
			// bill and record deletion from sales
			if(isset($_GET['sales_id']))
			{
				$sales_id=$_GET['sales_id'];
				
				mysql_query("delete from `sales` where `Sid`='$sales_id'") or die();
				mysql_query("delete from `sale_bill2` where `s_id`='$sales_id'") or die();	
				mysql_query("delete from `salesbill` where `s_id`='$sales_id'") or die();
				header("Location:store.php?page=report&id=$sales_id&msg=Record Deleted Sucessfully");
			}
                        
                        if(isset($_GET['sid'])){
                            $sssid = $_GET['sid'];
                            mysql_query("delete from `sale_bill2` where `Sid`='$sssid'") or die(mysql_error());
                            
                            header("Location:store.php?page=addmoreproduct&sid=$sssid&msg=Record Deleted");
		
                        }
			
			

?>