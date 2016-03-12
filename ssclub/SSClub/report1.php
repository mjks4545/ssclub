<?php
			error_reporting(0);
			if($_GET['product'] || $_GET['to'] || $_GET['from'] || $_GET['type'] || $_GET['model'] || $_GET['name'])
			{
				$product=$_GET['product'];
				$type=$_GET['type'];
				$model=$_GET['model'];
				$to=$_GET['to'];
				$from=$_GET['from'];
				$name=$_GET['name'];
			
				
				if($product && $name)
				{
					$sql=mysql_query("select * from `sales` where `Product`='$product' AND `Cname`='$name'") or die();	
				}
				if($product && $to)
				{
				$sql=mysql_query("select * from `sales` where `Product`='$product' AND `Date`='$to'") or die();	
				}
				if($product && $type && $to)
				{
				$sql=mysql_query("select * from `sales` where `Product`='$product' AND `SubProduct`='$type'  AND `Date`='$to'") or die();
				}
				if($product && $type && $model && $to)
				{
				$sql=mysql_query("select * from `sales` where `Product`='$product' AND `SubProduct`='$type' AND `pmodel`='$model'  AND `Date`='$to'") or die();
				}
				if($product && $from)
				{
				$sql=mysql_query("select * from `sales` where `Product`='$product' AND `Date`>='$from'") or die();
				}
				if($product && $type && $from)
				{
				$sql=mysql_query("select * from `sales` where `Product`='$product' AND `SubProduct`='$type' AND `Date`>='$from'") or die();
				}
				if($product && $type && $model && $from)
				{
				$sql=mysql_query("select * from `sales` where `Product`='$product' AND `SubProduct`='$type' AND `pmodel`='$model' AND `Date`>='$from'") or die();
				}
				
			}
?>
<div style="margin-top:0px;color:#000" align="center"><h4>Sales Report</h4></div>
<table width="1095" border="1" align="center" style="color:#000">
  <tr style="background:#CCC">
    <th width="41" height="42" scope="col">S.NO</th>
    <th width="35" scope="col">Bill#</th>
    <th width="160" scope="col">Name</th>
    <th width="120" scope="col">Product</th>
    <th width="120" scope="col">Type</th>
    <th width="106" scope="col">Model</th>
    <th width="86" scope="col">License #</th>
    <th width="66" scope="col">Quantity</th>
    <th width="54" scope="col">Rate</th>
    <th width="53" scope="col">Total</th>
    <th width="65" scope="col">Purchase Price</th>
    <th width="113" scope="col">Date</th>
  </tr>
  <?php
  			$i=1;
			// varible for total
			
			$qty1="";
			$qty2="";
			$rate1="";
			$rate2="";
			$total1="";
			$total2="";
			$price1="";
			$price2="";
			
			while($row=mysql_fetch_array($sql))
		{
			$seller_id=$row['Sid'];
			$product1=$row['Product'];
			$type1=$row['SubProduct'];
			$model1=$row['pmodel'];
			$qty1+=$row['Quantity'];
			$rate1+=$row['Amount'];
			$total1+=$row['total'];
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
    <td><a href="store.php?page=editsale&amp;id=<?php echo $row['Sid'];?>"><?php echo $row['Cname'];?></a></td>
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
  		
		if($to)
		{
		$sql1=mysql_query("select * from `sales` where `Date`='$to'") or die();	
		}
		if($from)
		{
		$sql1=mysql_query("select * from `sales` where `Date`>='$from'") or die();
		}
		if($name)
		{
		 $sql1=mysql_query("select * from `sales` where `Cname`='$name'") or die();	
		}
		
		while($row1=mysql_fetch_array($sql1))
		{
			$sid=$row1['Sid'];
			
			if($product && $name)
			{
			$qry=mysql_query("select * from `sale_bill2` where `s_id`='$sid' AND `product`='$product'") or die();
			}
			if($product && $to)
			{
			$qry=mysql_query("select * from `sale_bill2` where `s_id`='$sid' AND `product`='$product'") or die();
			}
			if($type && $product && $to)
			{
			$qry=mysql_query("select * from `sale_bill2` where `s_id`='$sid' AND `product`='$product' AND `p_type`='$type'") or die();
			}
			if($product && $type && $model && $to)
			{
			$qry=mysql_query("select * from `sale_bill2` where `s_id`='$sid' AND `product`='$product' AND `p_type`='$type' AND `p_model`='$model'") or die();
			}
			if($product && $from)
			{
			$qry=mysql_query("select * from `sale_bill2` where `s_id`='$sid' AND `product`='$product'") or die();	
			}
			if($product && $type && $from)
			{
			$qry=mysql_query("select * from `sale_bill2` where `s_id`='$sid' AND `product`='$product' AND `p_type`='$type'") or die();	
			}
			if($product && $type && $model && $from)
			{
			$qry=mysql_query("select * from `sale_bill2` where `s_id`='$sid' AND `product`='$product' AND `p_type`='$type' AND `p_model`='$model'") or die();	
			}
			while($row2=mysql_fetch_array($qry))
			{
				$product2=$row2['product'];
				$type2=$row2['p_type'];
				$model2=$row2['p_model'];
				$qty2+=$row2['qty'];
				$rate2+=$row2['rate'];
				$total2+=$row2['total'];
				// get bill number from salesbill
				$qy1=mysql_query("select * from `salesbill` where `s_id`='$sid'") or die();
				$qyrow1=mysql_fetch_array($qy1);
				
				// query to fetch purchase price
			$query3=mysql_query("select * from `purchase` where `product`='$product2' AND `prd_type`='$type2' AND `pmodel`='$model2' ORDER BY `p_id` DESC") or die(mysql_error());
			$row7=mysql_fetch_array($query3);
			$price2+=$row7['price']*$row2['qty'];
  ?>
   <tr align="center">
    <td height="23"><?php echo $i;?></td>
    <td><?php echo $qyrow1['sb_id'];?></td>
    <td><a href="store.php?page=editsale&id=<?php echo $row1['Sid'];?>"><?php echo $row1['Cname'];?></a></td>
    <td><?php echo $row2['product'];?></td>
    <td><?php echo $row2['p_type'];?></td>
    <td><?php echo $row2['p_model'];?></td>
    <td><?php echo $row['LicenseNo'];?></td>
    <td><?php echo $row2['qty'];?></td>
    <td><?php echo $row2['rate'];?></td>
    <td><?php echo $row2['total'];?></td>
    <td><?php echo $row7['price']*$row2['qty'];?></td>
    <td><?php echo $row1['Date'];?></td>
  </tr>
  <?php $i++;}}?>
  </table>
  <!---table 2 for totaling----->
   <table width="260" height="27" border="1" style="float:right;margin-right:225px;">
  <tr align="center">
    <th width="67" scope="row"><?php echo $qty1+$qty2;?></th>
    <td width="51"><?php echo $rate1+$rate2;?></td>
    <td width="51"><?php echo $total1+$total2;?></td>
    <td width="63"><?php  echo $price1+$price2;?></td>
  </tr>
</table>