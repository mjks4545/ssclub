<?php
			error_reporting(0);
		
			if($_GET['name'] || $_GET['prodcut'] ||  $_GET['from'] || $_GET['to'] || $_GET['type'] || $_GET['nic'] || $_GET['LicenseNo'] || $_GET['pmodel'] || $_GET['membership'] || $_GET['billno'])
			{
				$cname=$_GET['name'];
				$nic=$_GET['nic'];
				$LicenseNo=$_GET['LicenseNo'];
				$billno=$_GET['billno'];
				$product=$_GET['prodcut'];
				$type=$_GET['type'];
				$pmodel=$_GET['pmodel'];
				$from=$_GET['from'];
				$to=$_GET['to'];
				$membership=$_GET['membership'];
				
				if($billno)
				{
						$billquery=mysql_query("select `s_id` from `salesbill` where `sb_id`='$billno'") or die(mysql_error());
						$fetch=mysql_fetch_array($billquery);
						$sales_id=$fetch[0];
							
						$query=mysql_query("select * from `sales` where `Sid`='$sales_id'") or die(mysql_error());			
				}
				if($cname)
				{
					
					$query=mysql_query("select * from `sales` where `Cname` LIKE '$cname%'") or die(mysql_error());	
				}else
				if($nic)
				{
					$query=mysql_query("select * from `sales` where `NIC` LIKE '$nic%'") or die(mysql_error());
				}else
				if($LicenseNo)
				{
					$query=mysql_query("select * from `sales` where `LicenseNo` LIKE '$LicenseNo%'") or die(mysql_error());
				}else
				if($product)
				{
					$query=mysql_query("select * from `sales` where `Product`='$product'") or die(mysql_error());	
				}
				if($product && $type)
				{
					$query=mysql_query("select * from `sales` where `Product`='$product' AND `SubProduct`='$type'") or die();	
				}
				if($product && $type && $pmodel)
				{
					
					$query=mysql_query("select * from `sales` where `Product`='$product' AND `SubProduct`='$type' AND `pmodel`='$pmodel'") or die();	
			}
				
				if($from)
				{
					$query=mysql_query("select * from `sales` where `Date`='$from'") or die(mysql_error());	
				}
				
				if($to)
				{
					$query=mysql_query("select * from `sales` where `Date`='$to'") or die(mysql_error());	
				}
				
				if($from && $to)
				{
					$query=mysql_query("select * from `sales` where  `Date`>='$from' AND `Date`<='$to'") or die(mysql_error());	
				}
				if($membership)
				{
					$query=mysql_query("select * from `sales` where `membership`='$membership'") or die(mysql_error());	
				}
				if($membership && $from)
				{
					$query=mysql_query("select * from `sales` where `membership`='$membership' AND `Date`>='$from'") or die(mysql_error());	
				}
				if($membership && $to)
				{
					$query=mysql_query("select * from `sales` where `membership`='$membership' AND `Date`='$to'") or die(mysql_error());	
				}
				if($membership && $from && $to)
				{
					$query=mysql_query("select * from `sales` where `membership`='$membership' AND `Date`>='$from' AND `Date`<='$to'") or die(mysql_error());	
				}
				if($cname && $from)
				{
					$query=mysql_query("select * from `sales` where `Cname`='$cname' AND `Date`>='$from'") or die(mysql_error());	
				}
				if($cname && $to)
				{
					$query=mysql_query("select * from `sales` where `Cname`='$cname' AND `Date`='$to'") or die(mysql_error());	
				}
				if($cname && $from && $to)
				{
					$query=mysql_query("select * from `sales` where `Cname`='$cname' AND `Date`>='$from' AND `Date`<='$to'") or die(mysql_error());	
				}
				if($product && $from)
				{
					$query=mysql_query("select * from `sales` where `Product`='$product' AND `Date`>='$from'") or die(mysql_error());	
				}
				if($product && $to)
				{
					$query=mysql_query("select * from `sales` where `Product`='$product' AND `Date`='$to'") or die(mysql_error());	
				}
				if($product && $from && $to)
				{
					$query=mysql_query("select * from `sales` where `Product`='$product' AND `Date`>='$from' AND `Date`<='$to'") or die(mysql_error());	
				}
				if($product && $type && $pmodel && $from && $to)
				{
					$query=mysql_query("select * from `sales` where `Product`='$product' AND `SubProduct`='$type' AND `pmodel`='$pmodel' AND `Date`>='$from' AND `Date`<='$to'") or die(mysql_error());	
				}
				if($product && $type && $pmodel && $from)
				{
					$query=mysql_query("select * from `sales` where `Product`='$product' AND `SubProduct`='$type' AND `pmodel`='$pmodel' AND `Date`>='$from'") or die(mysql_error());	
				}
				if($product && $type && $pmodel && $to)
				{
					$query=mysql_query("select * from `sales` where `Product`='$product' AND `SubProduct`='$type' AND `pmodel`='$pmodel' AND `Date`='$to'") or die(mysql_error());	
				}
				if($LicenseNo && $to)
				{
					$query=mysql_query("select * from `sales` where `LicenseNo`='$LicenseNo' AND `Date`='$to'") or die(mysql_error());
				}
				if($nic && $to)
				{
					$query=mysql_query("select * from `sales` where `NIC`='$nic' AND `Date`='$to'") or die(mysql_error());
				}
				
				
		
		
?>
<div style="margin-top:0px;color:#000" align="center"><h4>Sales Report</h4></div>
<table width="1280" border="1" align="center" style="color:#000;">
  <tr style="background:#CCC">
    <th width="51" height="23" scope="col">S.NO</th>
    <th width="43" scope="col">Bill#</th>
    <th width="147" scope="col">Name</th>
    <th width="147" nowrap="nowrap" scope="col">Product</th>
    <th width="151" scope="col" nowrap="nowrap">Product Type</th>
    <th width="135" scope="col">Prodcut Model</th>
    <th width="120" scope="col" nowrap="nowrap">License NO</th>
    <th width="75" scope="col">Quantity</th>
    <th width="78" scope="col">Rate</th>
    <th width="77" scope="col">Total</th>
    <th width="103" scope="col">Purchase Price</th>
    <th width="77" scope="col">Date</th>
  </tr>
  <?php 
  		$i=1;
		 
		$qunty1="";
		$qunty2="";
		$qnty3="";
		$rat1="";
		$rat2="";
		$rate3="";
		$tot1="";
		$tot2="";
		$tot3="";
		$s_purchase1="";
		$s_purchase2="";
		$purchase3="";
		$name="";
		$seller_id="";
		
		if($query)
		{
  		while($row=mysql_fetch_array($query))
		{
			// fetch product,type and model for purchase price
			$product1=$row['Product'];
			$ptype1=$row['SubProduct'];
			$pmodel1=$row['pmodel'];
			$name=$row['Cname'];
			$seller_id=$row['Sid'];
			$qunty1+=$row['Quantity'];
			$rat1+=$row['Amount'];
			$tot1+=$row['total'];
			
			// query for bill number for first table
			$qrybill=mysql_query("select * from `salesbill` where `s_id`='$seller_id'") or die();
			$result=mysql_fetch_array($qrybill);
			
			// query to fetch purchase price
			$query3=mysql_query("select * from `purchase` where `product`='$product1' AND `prd_type`='$ptype1' AND `pmodel`='$pmodel1' ORDER BY `p_id` DESC") or die(mysql_error());
			$row6=mysql_fetch_array($query3);
			
			
			$s_purchase1+=$row6['price']*$row['Quantity'];
 ?>
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $result['sb_id'];?></td>
    <td><a href="store.php?page=editsale&amp;id=<?php echo $row['Sid'];?>"><?php echo $row['Cname'];?></a></td>
    <td><?php echo $row['Product'];?></td>
    <td><?php echo $row['SubProduct'];?></td>
    <td><?php echo $row['pmodel'];?></td>
    <td><?php echo $row['LicenseNo'];?></td>
    <td><?php echo $row['Quantity'];?></td>
    <td><?php echo $row['Amount'];?></td>
    <td><?php echo $row['total'];?></td>
    <td><?php echo $row6['price']*$row['Quantity'];?></td>
    <td><?php  echo $row['Date'];?></td>
  </tr><?php $i++;?>
   <!--second row FOR SECOND PRODCUT------->
   <?php
  			$s_query=mysql_query("select * from `sales` where `Sid`='$seller_id'") or die();
			while($s_row=mysql_fetch_array($s_query))
			{
				$s_id1=$s_row['Sid'];
			
			// query for bill number for first table
			$qrybill1=mysql_query("select * from `salesbill` where `s_id`='$seller_id'") or die();
			$result1=mysql_fetch_array($qrybill1);
			// for secnd prodcut from sale_bill2
				$s_qry=mysql_query("select * from `sale_bill2` where `s_id`='$s_id1'") or die();
				
				while($s_row1=mysql_fetch_array($s_qry))
			{
				$Prod=$s_row1['product'];
				$ptype3=$s_row1['p_type'];
				$pmod=$s_row1['p_model'];
				$qunty2+=$s_row1['qty'];
				$rat2+=$s_row1['rate'];
				$tot2+=$s_row1['total'];
				
				$query9=mysql_query("select * from `purchase` where `product`='$Prod' AND `prd_type`='$ptype3' AND `pmodel`='$pmod' ORDER BY `p_id` DESC ") or die(mysql_error());
			$row7=mysql_fetch_array($query9);
			
			$s_purchase2+=$row7['price']*$s_row1['qty'];
  ?>
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $result1['sb_id'];?></td>
    <td><a href="store.php?page=editsale&amp;id=<?php echo $s_row['Sid'];?>"><?php echo $s_row['Cname'];?></a></td>
    <td><?php echo $Prod;?></td>
    <td><?php echo $ptype3;?></td>
    <td><?php echo $pmod;?></td>
    <td><?php echo $s_row['LicenseNo'];?></td>
    <td><?php echo $s_row1['qty'];?></td>
    <td><?php echo $s_row1['rate'];?></td>
    <td><?php  echo $s_row1['total'];?></td>
    <td><?php  echo $row7['price']*$s_row1['qty'];?></td>
    <td><?php  echo $s_row['Date'];?></td>
  </tr><?php $i++;}}}}?>
 
  
  <?php
  			// when product type and model is selected show second table procudt
  			
			if(isset($product) && isset($type) && isset($pmodel))
			{
			
			$salesbill2=mysql_query("select * from `sale_bill2` where `product`='$product' AND `p_type`='$type' AND `p_model`='$pmodel'") or die()
			;
			
			while($billrow=mysql_fetch_array($salesbill2))
			{
				$id=$billrow['s_id'];	
				$qnty3+=$billrow['qty'];
				$rate3+=$billrow['rate'];
				$tot3+=$billrow['total'];
				
				// get bill number from salesbill
				$qy1=mysql_query("select * from `salesbill` where `s_id`='$id'") or die();
				$qyrow1=mysql_fetch_array($qy1);
				//
				$qy=mysql_query("select * from `sales` where `Sid`='$id'") or die();
				$qyrow=mysql_fetch_array($qy);	
				
				// calculate purchase price
					$p_query=mysql_query("select * from `purchase` where `product`='$product' AND `prd_type`='$type' AND `pmodel`='$pmodel' ORDER BY `p_id` DESC") or die(mysql_error());
			$p_rice=mysql_fetch_array($p_query);
			
			$purchase3+=$p_rice['price']*$billrow['qty'];	
  ?>
  <!-----product type and model from 2nd tabele--------->
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $qyrow1['sb_id'];?></td>
    <td><a href="store.php?page=editsale&amp;id=<?php echo $billrow['s_id'];?>"><?php echo $qyrow['Cname'];?></a></td>
    <td><?php echo $billrow['product'];?></td>
    <td><?php echo $billrow['p_type'];?></td>
    <td><?php echo $billrow['p_model'];?></td>
    <td><?php echo $qyrow['LicenseNo'];?></td>
    <td><?php echo $billrow['qty'];?></td>
    <td><?php echo $billrow['rate'];?></td>
    <td><?php echo $billrow['total'];?></td>
    <td><?php echo $p_rice['price']*$billrow['qty'];?></td>
    <td><?php  echo $qyrow['Date'];?></td>
  </tr>
  <?php $i++;}}?>
  </table>
  
<table width="361" height="27" border="1" style="float:right;margin-right:90px;">
  <tr align="center">
    <th width="74" scope="row"><?php echo $qunty1+$qunty2+$qnty3;?></th>
    <td width="79"><?php echo $rat1+$rat2+$rate3;?></td>
    <td width="79"><?php echo $tot1+$tot2+$tot3;?></td>
    <td width="101"><?php echo $s_purchase1+$s_purchase2+$purchase3;?></td>
  </tr>
</table>
<?php }?>
<!---For empty search reuslt ---->
					<?php
                    			
								if(isset($_GET['by']) and $_GET['by']=="asc"){
									$_GET['by']="desc";
									}else
								if(isset($_GET['by']) and $_GET['by']=="desc")
								{
									$_GET['by']="asc";
								}

								if(empty($_GET['name']) && empty($_GET['prodcut']) &&  empty($_GET['from']) && empty($_GET['to']) && empty($_GET['type']) && empty($_GET['nic']) && empty($_GET['LicenseNo']) && empty($_GET['membership']) && empty($_GET['billno']))
								{
									$qry=mysql_query("select * from `sales` ORDER BY `Sid` ".$_GET['by']."") or die();
									
				?>

<div style="margin-top:0px;color:#000" align="center"><h4>Sales Report</h4></div>
<table width="1280" border="1" align="center" style="color:#000;">
  <tr style="background:#CCC">
    <th width="56" height="33" scope="col">S.NO</th>
    <th width="37" scope="col"><?php if($_GET['by']==""){?><a href="store.php?page=reportresult&by=asc">Bill#</a><?php }?><?php if(isset($_GET['by'])=='asc'){?><a href="store.php?page=reportresult&by=desc">Bill#</a><?php }?></th>
    <th width="153" scope="col">Name</th>
    <th width="132" nowrap="nowrap" scope="col">Product</th>
    <th width="153" scope="col" nowrap="nowrap">Product Type</th>
    <th width="132" scope="col" nowrap="nowrap">Product Model</th>
    <th width="117" scope="col" nowrap="nowrap">License NO</th>
    <th width="76" scope="col">Quantity</th>
    <th width="64" scope="col">Rate</th>
    <th width="91" scope="col">Total</th>
    <th width="98" scope="col" nowrap="nowrap">Purchase price</th>
   <th width="95" scope="col">Date</th>
  </tr>
  <?php 
  				
		$i=1;
		$sid="";
		// total varible empty
		$qty="";
		$qty1="";
		$rate="";
		$rate1="";
		$total1="";
		$total2="";
       $t_total="";
	   $row5['price']="";
	   $tpurchase_price="";
	   $t_price="";
	   
		if($qry)
		{
  		while($row1=mysql_fetch_array($qry))
		{
			
			$p_product=$row1['Product'];
			$p_type=$row1['SubProduct'];
			$p_model=$row1['pmodel'];
			$qty+=$row1['Quantity'];
			$rate+=$row1['Amount'];
			 $total1+=$row1['total'];
			
			// purchase price query
			$query2=mysql_query("select * from `purchase` where `product`='$p_product' AND `prd_type`='$p_type' AND `pmodel`='$p_model' ORDER BY `p_id` DESC ") or die(mysql_error());
			$row5=mysql_fetch_array($query2);
			
			$sid=$row1['Sid'];
			
			
			
			 //get bill_number from salesbill for first table
			$query5=mysql_query("select * from `salesbill` where `s_id`='$sid'") or die();
			$row9=mysql_fetch_array($query5);
			
			
			  
			
			// purchase price puls
			$tpurchase_price+=$row5['price']*$row1['Quantity']; 
			
			// add qty ,rate ,total 
			// $t_qty+=$row1['Quantity']+$qty;
			//$t_rate+=$row1['Amount']+$rate;
			
  ?>
  
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $row9['sb_id'];?></td>
    <td><a href="store.php?page=editsale&amp;id=<?php echo $row1['Sid'];?>"><?php echo $row1['Cname'];?></a></td>
    <td><?php echo $row1['Product'];?></td>
    <td><?php echo $row1['SubProduct'];?></td>
    <td><?php echo $row1['pmodel'];?></td>
    <td><?php echo $row1['LicenseNo'];?></td>
    <td><?php echo $row1['Quantity'];?></td>
    <td><?php echo $row1['Amount'];?></td>
    <td><?php echo $row1['total'];?></td>
    <td><?php echo $row5['price']*$row1['Quantity'];?></td>
    <td><?php  echo $row1['Date'];?></td>
  </tr><?php $i++;}?>
 
  <?php
  		 // second row
		 
  		$secon_qry=mysql_query("select * from `sales` ORDER BY `Sid` ".$_GET['by']."") or die();
		
		
		
		while($sec_row=mysql_fetch_array($secon_qry))
		{
			$s_id=$sec_row['Sid'];
			//get bill_number from salesbill for 2nd table
				$querybill=mysql_query("select * from `salesbill` where `s_id`='$s_id'") or die();
				$row10=mysql_fetch_array($querybill);
			// select qty rate total from sale_bill2
			$qry2=mysql_query("select * from `sale_bill2` where `s_id`='$s_id'") or die();
			while($row3=mysql_fetch_array($qry2))
			{
				$Prod=$row3['product'];
				$ptype3=$row3['p_type'];
				$pmod=$row3['p_model'];
				//$ssid=$row3['s_id'];
				
				
				
				// purchase price for sales_bill2
				$query8=mysql_query("select * from `purchase` where `product`='$Prod' AND `prd_type`='$ptype3' AND `pmodel`='$pmod' ORDER BY `p_id` DESC ") or die(mysql_error());
			$row6=mysql_fetch_array($query8);
				
				// select qty rate total from sales
				$qty1+=$row3['qty'];
				 $rate1+=$row3['rate'];
				 $total2+=$row3['total'];
				 // total purchase price fro second sales_table2
				 $t_price+=$row6['price']*$row3['qty'];
				
  ?>
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $row10['sb_id'];?></td>
    <td><a href="store.php?page=editsale&amp;id=<?php echo $s_id;?>"><?php echo $sec_row['Cname'];?></a></td>
    <td><?php echo $row3['product'];?></td>
    <td><?php echo $row3['p_type'];?></td>
    <td><?php echo $row3['p_model'];?></td>
    <td><?php echo $sec_row['LicenseNo'];?></td>
    <td><?php echo  $row3['qty'];?></td>
    <td><?php echo $row3['rate'];?></td>
    <td><?php echo $row3['total'];?></td>
    <td><?php echo $row6['price']*$row3['qty'];?></td>
    <td><?php  echo $sec_row['Date'];?></td>
  </tr><?php $i++;}}}?>
</table>

<table width="356" height="27" border="1" style="float:right;margin-right:110px;">
  <tr align="center">
  	<th width="80" scope="row"><?php echo $qty+$qty1;?></th>
    <td width="61"><?php echo $rate+$rate1;?></td>
    <td width="90"><?php echo $total1+$total2;?></td>
    <th width="97" scope="row"><?php echo $tpurchase_price+$t_price;?></th>
  </tr>
 </table>
<?php }?>