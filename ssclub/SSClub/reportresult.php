<?php
ob_start();
			
			if(isset($_GET['prodcut']) || $_GET['type'] || $_GET['pmodel'] || $_GET['name'] || $_GET['nic'] || $_GET['LicenseNo'] || $_GET['billno'] || $_GET['weaponno'] || $_GET['membership'] || $_GET['to'] || $_GET['from'])
			{
				$product=$_GET['prodcut'];
				$type=$_GET['type'];
				$model=$_GET['pmodel'];
				$name=$_GET['name'];
				$nic=$_GET['nic'];
				$licenseno=$_GET['LicenseNo'];
				$billno=$_GET['billno'];
                                $weaponno = $_GET['weaponno'];
				$membership=$_GET['membership'];
				$from=$_GET['from'];
				$to=$_GET['to'];
                                
				
				
				if($product)
				{
					$query=mysql_query("select * from `sales` where `Product`='$product'") or die(mysql_error());
				}
                                if($weaponno){
                                    $query = mysql_query("select * from `sales` where `weapon_no`='$weaponno'") or die(mysql_error());
                                }
                                if($weaponno){
                                    $query1 = mysql_query("select * from `sale_bill2` where `weapon_no`='$weaponno'") or die(mysql_error());
                                }
				if($product)
				{
					$query1=mysql_query("select * from `sale_bill2` where `product`='$product'") or die();	
				}
				if($product && $type)
				{
					$query=mysql_query("select * from `sales` where `Product`='$product' AND `SubProduct`='$type'") or die();
				}
				if($product && $type)
				{
					$query1=mysql_query("select * from `sale_bill2` where `product`='$product' AND `p_type`='$type'") or die();	
				}
				if($product && $type && $model)
				{
					$query=mysql_query("select * from `sales` where `Product`='$product' AND `SubProduct`='$type' AND `pmodel`='$model'") or die();	
				}
				if($product && $type && $model)
				{
					$query1=mysql_query("select * from `sale_bill2` where `product`='$product' AND `p_type`='$type' AND `p_model`='$model'") or die();
				}
				
				if($name)
				{
					header("Location:store.php?page=report2&name=$name");					
				}
				if($nic)
				{
					$query=mysql_query("select * from `sales` where `NIC`='$nic'") or die();
					
				}
				if($licenseno)
				{
					$query=mysql_query("select * from `sales` where `LicenseNo`='$licenseno'") or die();
					
				}
				if($billno)
				{
					$billquery=mysql_query("select `s_id` from `salesbill` where `sb_id`='$billno'") or die(mysql_error());
					$fetch=mysql_fetch_array($billquery);
					$sales_id=$fetch[0];
							
					$query=mysql_query("select * from `sales` where `Sid`='$sales_id'") or die(mysql_error());	
				}
				if($membership)
				{
					$query=mysql_query("select * from `sales` where `membership`='$membership'") or die();	
				}
				if($from)
				{
					$query=mysql_query("select * from `sales` where `Date`>='$from'") or die();	
				}
				
				if($to)
				{
					$query=mysql_query("select * from `sales` where `Date`='$to'") or die();	
				}
				if($from && $to)
				{
				 	$query=mysql_query("select * from `sales` where `Date`>='$from' AND `Date`<='$to'") or die();	
				}
				// redirect ot report1 page and query to filters
				if($product && $to)
				{
					header("Location:store.php?page=report1&product=$product&to=$to");	
				}
				if($product && $type && $to)
				{
					header("Location:store.php?page=report1&product=$product&type=$type&to=$to");	
				}
				if($product && $type && $model && $to)
				{
					header("Location:store.php?page=report1&product=$product&type=$type&model=$model&to=$to");	
				}
				if($product && $from)
				{
					header("Location:store.php?page=report1&product=$product&from=$from");	
				}
				if($product && $type && $from)
				{
					header("Location:store.php?page=report1&product=$product&type=$type&from=$from");	
				}
				if($product && $type && $model && $from)
				{
					header("Location:store.php?page=report1&product=$product&type=$type&model=$model&from=$from");	
				}
				if($product && $name)
				{
					header("Location:store.php?page=report1&product=$product&name=$name");	
				}
				// other queries name
				
				if($name && $to)
				{
					header("Location:store.php?page=report2&name=$name&to=$to");	
				}
				if($name && $from)
				{
					header("Location:store.php?page=report2&name=$name&from=$from");
				}
				if($name && $from && $to)
				{
					header("Location:store.php?page=report2&name=$name&from=$from&to=$to");	
				}
				if($nic && $to)
				{
					header("Location:store.php?page=report2&nic=$nic&to=$to");	
				}
				if($nic && $from)
				{
					header("Location:store.php?page=report2&nic=$nic&from=$from");
				}
				if($membership && $to)
				{
					header("Location:store.php?page=report2&membership=$membership&to=$to");	
				}
				if($membership && $from)
				{
					header("Location:store.php?page=report2&membership=$membership&from=$from");	
				}
				if($licenseno && $to)
				{
					header("Location:store.php?page=report2&licenseno=$licenseno&to=$to");
				}
				if($licenseno && $from)
				{
					header("Location:store.php?page=report2&licenseno=$licenseno&from=$from");
				}
				if(empty($_GET['name']) && empty($_GET['prodcut']) &&  empty($_GET['from']) && empty($_GET['to']) && empty($_GET['type']) && empty($_GET['nic']) && empty($_GET['LicenseNo']) && empty($_GET['membership']) && empty($_GET['billno']) && empty($_GET['weaponno']))
								{
									header("Location:store.php?page=reportempty");	
								}
				
?>
<div style="margin-top:0px;color:#000" align="center"><h4>Sales Report</h4></div>
<table width="1101" border="1" align="center" style="color:#000">
  <tr style="background:#CCC">
    <th width="41" height="42" scope="col">S.NO</th>
    <th width="35" scope="col">Bill#</th>
    <th width="160" scope="col">Name</th>
    <th width="120" scope="col">Product</th>
    <th width="120" scope="col">Type</th>
    <th width="106" scope="col">Model</th>
    <th width="86" scope="col">License #</th>
    <th width="72" scope="col">Quantity</th>
    <th width="54" scope="col">Rate</th>
    <th width="58" scope="col">Total</th>
    <th width="65" scope="col">Purchase Price</th>
    <th width="108" scope="col">Date</th>
  </tr>
  <?php
  			// varaible for totaling 
			$i=1;
			$qty1="";
			$qty2="";
			$qty3="";
			$qty4="";
			$qty5="";
			$qty6="";
			$qty7="";
			$qty8="";
			$qty9="";
			$qty9="";
			// rate total varible
			$rate1="";
			$rate2="";
			$rate3="";
			$rate4="";
			$rate5="";
			$rate6="";
			$rate7="";
			$rate8="";
			$rate9="";
			// total varible totaling
			$tot1="";
			$tot2="";
			$tot3="";
			$tot4="";
			$tot5="";
			$tot6="";
			$tot7="";
			$tot8="";
			$tot9="";
			// purchase price total
			$price1="";
			$price2="";
			$price3="";
			$price4="";
			$price5="";
			$price6="";
			$price7="";
			$price8="";
			$price9="";
			
			while($row=mysql_fetch_array($query))
		{
			$seller_id=$row['Sid'];
			$product1=$row['Product'];
			$type1=$row['SubProduct'];
			$model1=$row['pmodel'];
			$qty1+=$row['Quantity'];
			$rate1+=$row['Amount'];
			$tot1+=$row['total'];
			// query for bill number for first table
			$qrybill=mysql_query("select * from `salesbill` where `s_id`='$seller_id'") or die();
			$result=mysql_fetch_array($qrybill);
			
			// query to fetch purchase price
			$query3=mysql_query("select * from `purchase` where `product`='$product1' AND `prd_type`='$type1' AND `pmodel`='$model1' ORDER BY `p_id` DESC") or die(mysql_error());
			$row6=mysql_fetch_array($query3);
			$price1+=$row6['price']*$row['Quantity'];	
  ?>
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $result['sb_id'];?></td>
    <td><a href="store.php?page=editsale&id=<?php echo $row['Sid'];?>"><?php echo $row['Cname'];?></a></td>
    <td><?php echo $row['Product'];?></td>
    <td><?php echo $row['SubProduct'];?></td>
    <td><?php echo $row['pmodel'];?></td>
    <td><?php echo $row['LicenseNo'];?></td>
    <td><?php echo $row['Quantity'];?></td>
    <td><?php echo $row['Amount'];?></td>
    <td><?php echo $row['total'];?></td>
    <td><?php echo $row6['price']*$row['Quantity'];?></td>
    <td><?php echo $row['Date'];?></td>
  </tr>
  <?php $i++;}?>
    
  <!----second row---second table product model and type querires--->
  <?php 
  		
		if(isset($query1))
		{
		while($row1=mysql_fetch_array($query1))
		{
			$sid=$row1['s_id'];
			$product2=$row1['product'];
			$type2=$row1['p_type'];
			$model2=$row1['p_model'];
			$qty2+=$row1['qty'];
			$rate2+=$row1['rate'];
			$tot2+=$row1['total'];
			$qry=mysql_query("select * from `sales` where `Sid`='$sid'") or die();
			$row2=mysql_fetch_array($qry);
			
			// get bill number from salesbill
			$qy1=mysql_query("select * from `salesbill` where `s_id`='$sid'") or die();
			$qyrow1=mysql_fetch_array($qy1);
			
			// query to fetch purchase price
			$query3=mysql_query("select * from `purchase` where `product`='$product2' AND `prd_type`='$type2' AND `pmodel`='$model2' ORDER BY `p_id` DESC") or die(mysql_error());
			$row7=mysql_fetch_array($query3);
			$price2+=$row7['price']*$row1['qty'];
  ?>
   <tr align="center">
    <td height="23"><?php echo $i;?></td>
    <td><?php echo $qyrow1['sb_id'];?></td>
    <td><a href="store.php?page=editsale&id=<?php echo $row2['Sid'];?>"><?php echo $row2['Cname'];?></a></td>
    <td><?php echo $row1['product'];?></td>
    <td><?php echo $row1['p_type'];?></td>
    <td><?php echo $row1['p_model'];?></td>
    <td><?php echo $row2['LicenseNo'];?></td>
    <td><?php echo $row1['qty'];?></td>
    <td><?php echo $row1['rate'];?></td>
    <td><?php echo $row1['total'];?></td>
    <td><?php echo $row7['price']*$row1['qty'];?></td>
    <td><?php echo $row2['Date'];?></td>
  </tr>
  <?php $i++;}}?>
   <!----end of second row---second table product model and type querires--->
 
  
 	<!--name in 2nd table--> 
    <?php
    		 
			 if(isset($name))
			 {
				$sql=mysql_query("select * from `sales` where `Cname`='$name'") or die();
			 }
			
			 if(isset($sql))
				{
				while($row3=mysql_fetch_array($sql))
				{
					$Sid=$row3['Sid'];
					
					
					$qry1=mysql_query("select * from `sale_bill2` where `s_id`='$Sid'") or die();
					while($row4=mysql_fetch_array($qry1))
					{
						$product2=$row4['product'];
						$type2=$row4['p_type'];
						$model2=$row4['p_model'];
						$qty3+=$row4['qty'];
						$rate3+=$row4['rate'];
						$tot3+=$row4['total'];
						// get bill number from salesbill
			$qy1=mysql_query("select * from `salesbill` where `s_id`='$Sid'") or die();
			$qyrow1=mysql_fetch_array($qy1);
			
			// query to fetch purchase price
			$query3=mysql_query("select * from `purchase` where `product`='$product2' AND `prd_type`='$type2' AND `pmodel`='$model2' ORDER BY `p_id` DESC") or die(mysql_error());
			$row7=mysql_fetch_array($query3);
			$price3+=$row7['price']*$row4['qty'];
	?>
      <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $qyrow1['sb_id'];?></td>
    <td><a href="store.php?page=editsale&id=<?php echo $row3['Sid'];?>"><?php echo $row3['Cname'];?></a></td>
    <td><?php echo $row4['product'];?></td>
    <td><?php echo $row4['p_type'];?></td>
    <td><?php echo $row4['p_model'];?></td>
    <td><?php echo $row3['LicenseNo'];?></td>
    <td><?php echo $row4['qty'];?></td>
    <td><?php echo $row4['rate'];?></td>
    <td><?php echo $row4['total'];?></td>
    <td><?php echo $row7['price']*$row4['qty'];?></td>
    <td><?php echo $row3['Date'];?></td>
  </tr>
  <?php $i++;}}}?>
  
  <!--NIC in 2nd table--> 
    <?php
    		 
			 if(isset($nic))
			 {
				$sql1=mysql_query("select * from `sales` where `NIC`='$nic'") or die();
			 }
			
			
				while($row4=mysql_fetch_array($sql1))
				{
					$Sid1=$row4['Sid'];
					$qry2=mysql_query("select * from `sale_bill2` where `s_id`='$Sid1'") or die();
					while($row5=mysql_fetch_array($qry2))
					{
						$product2=$row5['product'];
						$type2=$row5['p_type'];
						$model2=$row5['p_model'];	
						$qty4+=$row5['qty'];
						$rate4+=$row5['rate'];
						$tot4+=$row5['total'];
						// get bill number from salesbill
			$qy1=mysql_query("select * from `salesbill` where `s_id`='$Sid1'") or die();
			$qyrow1=mysql_fetch_array($qy1);
			
			// query to fetch purchase price
			$query3=mysql_query("select * from `purchase` where `product`='$product2' AND `prd_type`='$type2' AND `pmodel`='$model2' ORDER BY `p_id` DESC") or die(mysql_error());
			$row7=mysql_fetch_array($query3);
			$price4+=$row7['price']*$row5['qty'];
	?>
      <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $qyrow1['sb_id'];?></td>
    <td><a href="store.php?page=editsale&id=<?php echo $row4['Sid'];?>"><?php echo $row4['Cname'];?></a></td>
    <td><?php echo $row5['product'];?></td>
    <td><?php echo $row5['p_type'];?></td>
    <td><?php echo $row5['p_model'];?></td>
    <td><?php echo $row4['LicenseNo'];?></td>
    <td><?php echo $row5['qty'];?></td>
    <td><?php echo $row5['rate'];?></td>
    <td><?php echo $row5['total'];?></td>
    <td><?php echo $row7['price']*$row5['qty'];?></td>
    <td><?php echo $row4['Date'];?></td>
  </tr>
  <?php $i++;}}?>
 <!--License no in 2nd table--> 
    <?php
    		 
			 if($licenseno)
			 {
				$sql1=mysql_query("select * from `sales` where `LicenseNo`='$licenseno'") or die();
			 }
			
			
				while($row4=mysql_fetch_array($sql1))
				{
					$Sid1=$row4['Sid'];
					$qry2=mysql_query("select * from `sale_bill2` where `s_id`='$Sid1'") or die();
					while($row5=mysql_fetch_array($qry2))
					{
					
						$product2=$row5['product'];
						$type2=$row5['p_type'];
						$model2=$row5['p_model'];
						$qty5+=$row5['qty'];
						$rate5+=$row5['rate'];
						$tot5+=$row5['total'];	
			// get bill number from salesbill
			$qy1=mysql_query("select * from `salesbill` where `s_id`='$Sid1'") or die();
			$qyrow1=mysql_fetch_array($qy1);
			
			// query to fetch purchase price
			$query3=mysql_query("select * from `purchase` where `product`='$product2' AND `prd_type`='$type2' AND `pmodel`='$model2' ORDER BY `p_id` DESC") or die(mysql_error());
			$row7=mysql_fetch_array($query3);
			$price5+=$row7['price']*$row5['qty'];
	?>
      <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $qyrow1['sb_id'];?></td>
    <td><a href="store.php?page=editsale&id=<?php echo $row4['Sid'];?>"><?php echo $row4['Cname'];?></a></td>
    <td><?php echo $row5['product'];?></td>
    <td><?php echo $row5['p_type'];?></td>
    <td><?php echo $row5['p_model'];?></td>
    <td><?php echo $row4['LicenseNo'];?></td>
    <td><?php echo $row5['qty'];?></td>
    <td><?php echo $row5['rate'];?></td>
    <td><?php echo $row5['total'];?></td>
    <td><?php echo $row7['price']*$row5['qty'];?></td>
    <td><?php echo $row4['Date'];?></td>
  </tr>
  <?php $i++;}}?>
<!--bill no in 2nd table--> 
    <?php
    		 
			 if($billno)
				{
					$billquery1=mysql_query("select `s_id` from `salesbill` where `sb_id`='$billno'") or die(mysql_error());
					$fetch1=mysql_fetch_array($billquery1);
					$sales_id=$fetch1[0];
							
					$sql1=mysql_query("select * from `sales` where `Sid`='$sales_id'") or die(mysql_error());	
				}
				while($row4=mysql_fetch_array($sql1))
				{
					$Sid1=$row4['Sid'];
					$qry2=mysql_query("select * from `sale_bill2` where `s_id`='$Sid1'") or die();
					while($row5=mysql_fetch_array($qry2))
					{
						$product2=$row5['product'];
						$type2=$row5['p_type'];
						$model2=$row5['p_model'];	
						$qty6+=$row5['qty'];
						$rate6+=$row5['rate'];
						$tot6+=$row5['total'];
						// get bill number from salesbill
			$qy1=mysql_query("select * from `salesbill` where `s_id`='$Sid1'") or die();
			$qyrow1=mysql_fetch_array($qy1);
			
			// query to fetch purchase price
			$query3=mysql_query("select * from `purchase` where `product`='$product2' AND `prd_type`='$type2' AND `pmodel`='$model2' ORDER BY `p_id` DESC") or die(mysql_error());
			$row7=mysql_fetch_array($query3);
			$price6+=$row7['price']*$row5['qty'];
	?>
      <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $qyrow1['sb_id'];?></td>
    <td><a href="store.php?page=editsale&id=<?php echo $row4['Sid'];?>"><?php echo $row4['Cname'];?></a></td>
    <td><?php echo $row5['product'];?></td>
    <td><?php echo $row5['p_type'];?></td>
    <td><?php echo $row5['p_model'];?></td>
    <td><?php echo $row4['LicenseNo'];?></td>
    <td><?php echo $row5['qty'];?></td>
    <td><?php echo $row5['rate'];?></td>
    <td><?php echo $row5['total'];?></td>
    <td><?php echo $row7['price']*$row5['qty'];?></td>
    <td><?php echo $row4['Date'];?></td>
  </tr>
  <?php $i++;}}?>
  
  <!--Membership in 2nd table--> 
    <?php
    		 
			 if($membership)
				{
					$sql1=mysql_query("select * from `sales` where `membership`='$membership'") or die(mysql_error());	
				}
			
				while($row4=mysql_fetch_array($sql1))
				{
					$Sid1=$row4['Sid'];
					$qry2=mysql_query("select * from `sale_bill2` where `s_id`='$Sid1'") or die();
					while($row5=mysql_fetch_array($qry2))
					{
						$product2=$row5['product'];
						$type2=$row5['p_type'];
						$model2=$row5['p_model'];
						$qty7+=$row5['qty'];
						$rate7+=$row5['rate'];
						$tot7+=$row5['total'];
						// get bill number from salesbill
				$qy1=mysql_query("select * from `salesbill` where `s_id`='$Sid1'") or die();
				$qyrow1=mysql_fetch_array($qy1);
				// query to fetch purchase price
			$query3=mysql_query("select * from `purchase` where `product`='$product2' AND `prd_type`='$type2' AND `pmodel`='$model2' ORDER BY `p_id` DESC") or die(mysql_error());
			$row7=mysql_fetch_array($query3);
			$price7+=$row7['price']*$row5['qty'];
	?>
      <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $qyrow1['sb_id'];?></td>
    <td><a href="store.php?page=editsale&id=<?php echo $row4['Sid'];?>"><?php echo $row4['Cname'];?></a></td>
    <td><?php echo $row5['product'];?></td>
    <td><?php echo $row5['p_type'];?></td>
    <td><?php echo $row5['p_model'];?></td>
    <td><?php echo $row4['LicenseNo'];?></td>
    <td><?php echo $row5['qty'];?></td>
    <td><?php echo $row5['rate'];?></td>
    <td><?php echo $row5['total'];?></td>
    <td><?php echo $row7['price']*$row5['qty'];?></td>
    <td><?php echo $row4['Date'];?></td>
  </tr>
  <?php $i++;}}?>
   <!--date from entries in 2nd table--> 
    <?php
    		 
			 if($from)
				{
					$sql1=mysql_query("select * from `sales` where `Date`>='$from'") or die(mysql_error());	
				}
				 if($from && $to)
				{
					$sql1=mysql_query("select * from `sales` where `Date`>='$from' AND `Date`<='$to'") or die(mysql_error());	
				}
				while($row4=mysql_fetch_array($sql1))
				{
					$Sid1=$row4['Sid'];
					$qry2=mysql_query("select * from `sale_bill2` where `s_id`='$Sid1'") or die();
					while($row5=mysql_fetch_array($qry2))
					{
						$product2=$row5['product'];
						$type2=$row5['p_type'];
						$model2=$row5['p_model'];
						$qty8+=$row5['qty'];
						$rate8+=$row5['rate'];
						$tot8+=$row5['total'];
						// get bill number from salesbill
				$qy1=mysql_query("select * from `salesbill` where `s_id`='$Sid1'") or die();
				$qyrow1=mysql_fetch_array($qy1);
				
				// query to fetch purchase price
			$query3=mysql_query("select * from `purchase` where `product`='$product2' AND `prd_type`='$type2' AND `pmodel`='$model2' ORDER BY `p_id` DESC") or die(mysql_error());
			$row7=mysql_fetch_array($query3);
			$price8+=$row7['price']*$row5['qty'];
	?>
      <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $qyrow1['sb_id'];?></td>
    <td><a href="store.php?page=editsale&amp;id=<?php echo $row4['Sid'];?>"><?php echo $row4['Cname'];?></a></td>
    <td><?php echo $row5['product'];?></td>
    <td><?php echo $row5['p_type'];?></td>
    <td><?php echo $row5['p_model'];?></td>
    <td><?php echo $row4['LicenseNo'];?></td>
    <td><?php echo $row5['qty'];?></td>
    <td><?php echo $row5['rate'];?></td>
    <td><?php echo $row5['total'];?></td>
    <td><?php echo $row7['price']*$row5['qty'];?></td>
    <td><?php echo $row4['Date'];?></td>
  </tr>
  <?php $i++;}}?>

 <!--date to entries in 2nd table--> 
    <?php
    		 
			
			 if($to)
				{
					$sql1=mysql_query("select * from `sales` where `Date`='$to'") or die(mysql_error());	
				}
				while($row4=mysql_fetch_array($sql1))
				{
					$Sid1=$row4['Sid'];
					$qry2=mysql_query("select * from `sale_bill2` where `s_id`='$Sid1'") or die();
					while($row5=mysql_fetch_array($qry2))
					{
					
					$product2=$row5['product'];
					$type2=$row5['p_type'];
					$model2=$row5['p_model'];
					$qty9+=$row5['qty'];
					$rate9+=$row5['rate'];
					$tot9+=$row5['total'];	
					// get bill number from salesbill
				$qy1=mysql_query("select * from `salesbill` where `s_id`='$Sid1'") or die();
				$qyrow1=mysql_fetch_array($qy1);
				// query to fetch purchase price
			$query3=mysql_query("select * from `purchase` where `product`='$product2' AND `prd_type`='$type2' AND `pmodel`='$model2' ORDER BY `p_id` DESC") or die(mysql_error());
			$row7=mysql_fetch_array($query3);
			$price9+=$row7['price']*$row5['qty'];
				
	?>
      <tr align="center">
    <td height="23"><?php echo $i;?></td>
    <td><?php echo $qyrow1['sb_id'];?></td>
    <td><a href="store.php?page=editsale&id=<?php echo $row4['Sid'];?>"><?php echo $row4['Cname'];?></a></td>
    <td><?php echo $row5['product'];?></td>
    <td><?php echo $row5['p_type'];?></td>
    <td><?php echo $row5['p_model'];?></td>
    <td><?php echo $row4['LicenseNo'];?></td>
    <td><?php echo $row5['qty'];?></td>
    <td><?php echo $row5['rate'];?></td>
    <td><?php echo $row5['total'];?></td>
    <td><?php echo $row7['price']*$row5['qty'];?></td>
    <td><?php echo $row4['Date'];?></td>
  </tr>
  <?php $i++;}}?>
  
  
	 <!--Product and date  in 2nd table--> 
   
 </table>
<!--end of if condtion--->
<?php }?>
<!----total table------>
  <table width="274" height="27" border="1" style="float:right;margin-right:210px;">
  <tr align="center">
    <th width="70" scope="row"><?php echo $qty1+$qty2+$qty3+$qty4+$qty5+$qty6+$qty7+$qty8+$qty9;?></th>
    <td width="51"><?php echo $rate1+$rate2+$rate3+$rate4+$rate5+$rate6+$rate7+$rate8+$rate9;?></td>
    <td width="60"><?php echo $tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9;?></td>
    <td width="65"><?php  echo $price1+$price2+$price3+$price4+$price5+$price6+$price7+$price8+$price9;?></td>
  </tr>
</table>
<!-----------------------------End of Fields search------------------------------------>
<!-------------------------------Start of empty Search------------------------------------------------------>
