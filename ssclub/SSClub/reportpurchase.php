<?php
			error_reporting(0);
			$query="";
		
		if($_GET['name'] || $_GET['product'] ||  $_GET['from'] || $_GET['to'] || $_GET['type'] || $_GET['nic'] || $_GET['license'] || $_GET['weapon'] || $_GET['pmodel'] || $_GET['plan'])
		{
				$cname=$_GET['name'];
				$nic=$_GET['nic'];
				$LicenseNo=$_GET['license'];
				$product=$_GET['product'];
				$weapon=$_GET['weapon'];
				$type=$_GET['type'];
				$pmodel=$_GET['pmodel'];
				$from=$_GET['from'];
				$to=$_GET['to'];
				$plan=$_GET['plan'];
						
				if($cname)
				{
					$query=mysql_query("select * from `purchase` where `name` LIKE '$cname%'") or die(mysql_error());	
				}else
				if($nic)
				{
					$query=mysql_query("select * from `purchase` where `cnic` LIKE '$nic%'") or die(mysql_error());
				}else
				if($weapon)
				{
					$query=mysql_query("select * from `purchase` where `weapone_no` LIKE '$weapon%'") or die(mysql_error());
				}else
				if($LicenseNo)
				{
					$query=mysql_query("select * from `purchase` where `license_no` LIKE '$LicenseNo%'") or die(mysql_error());
				}else
				if($product)
				{
					$query=mysql_query("select * from `purchase` where `product` LIKE '$product%'") or die(mysql_error());
				}
				if($product && $type)
				{
					$query=mysql_query("select * from `purchase` where `Product` LIKE '$product%' AND `prd_type` LIKE '$type%'") or die();	
				}
				if($product && $type && $pmodel)
				{
					$query=mysql_query("select * from `purchase` where `Product` LIKE '$product%' AND `prd_type` LIKE '$type%' AND `pmodel` LIKE '$pmodel%'") or die();	
				}
				
				if($from)
				{
					$query=mysql_query("select * from `purchase` where `Date`='$from'") or die(mysql_error());	
				}
				if($to)
				{
					$query=mysql_query("select * from `purchase` where `Date`='$to'") or die(mysql_error());	
				}
				if($from && $to)
				{
					$query=mysql_query("select * from `purchase` where  `Date`>='$from' AND `Date`<='$to'") or die(mysql_error());	
				}
				if($plan)
				{
					$query=mysql_query("select * from `purchase` where `plan`='$plan'") or die(mysql_error());	
				}
				if($plan && $cname)
				{
					$query=mysql_query("select * from `purchase` where `plan`='$plan' AND `name`='$cname'") or die(mysql_error());	
				}
				if($cname && $to)
				{
					$query=mysql_query("select * from `purchase` where  `Date`='$to' AND `name`='$cname'") or die(mysql_error());	
				}
				if($cname && $from)
				{
					$query=mysql_query("select * from `purchase` where  `Date`>='$from' AND `name`='$cname'") or die(mysql_error());	
				}
				if($cname && $from && $to)
				{
					$query=mysql_query("select * from `purchase` where  `Date`>='$from' AND `Date`<='$to' AND `name`='$cname'") or die(mysql_error());	
				}
				if($nic && $from)
				{
					$query=mysql_query("select * from `purchase` where  `Date`>='$from' AND `cnic`='$nic'") or die(mysql_error());
				}
				if($nic && $to)
				{
					$query=mysql_query("select * from `purchase` where  `Date`='$to' AND `cnic`='$nic'") or die(mysql_error());
				}
				if($nic && $from && $to)
				{
					$query=mysql_query("select * from `purchase` where  `Date`>='$from' AND `Date`<='$to' AND `cnic`='$nic'") or die(mysql_error());
				}
				if($LicenseNo && $to)
				{
					$query=mysql_query("select * from `purchase` where `Date`='$to' AND `license_no`='$LicenseNo'") or die(mysql_error());
				}
				
				if($LicenseNo && $from)
				{
					$query=mysql_query("select * from `purchase` where  `Date`>='$from' AND `license_no`='$LicenseNo'") or die(mysql_error());
				}
				if($LicenseNo && $from && $to)
				{
					$query=mysql_query("select * from `purchase` where  `Date`>='$from' AND `Date`<='$to' AND `license_no`='$LicenseNo'") or die(mysql_error());
				}
				if($product && $from)
				{
					$query=mysql_query("select * from `purchase` where  `Date`>='$from' AND `product`='$product'") or die(mysql_error());	
				}
				if($product && $to)
				{
					$query=mysql_query("select * from `purchase` where  `Date`='$to' AND `product`='$product'") or die(mysql_error());	
				}
				if($product && $type && $from)
				{
					$query=mysql_query("select * from `purchase` where  `Date`>='$from' AND `product`='$product' AND `prd_type`='$type'") or die(mysql_error());	
				}
				if($product && $type && $pmodel && $from)
				{
					$query=mysql_query("select * from `purchase` where  `Date`>='$from' AND `product`='$product' AND `prd_type`='$type' AND `pmodel`='$pmodel'") or die(mysql_error());	
				}
				if($product && $type && $pmodel && $from && $to)
				{
					$query=mysql_query("select * from `purchase` where  `Date`>='$from' AND `Date`<='$to' AND `product`='$product' AND `prd_type`='$type' AND `pmodel`='$pmodel'") or die(mysql_error());	
				}
				if($product && $type && $pmodel && $cname)
				{
					$query=mysql_query("select * from `purchase` where  `name`='$cname' AND `product`='$product' AND `prd_type`='$type' AND `pmodel`='$pmodel'") or die(mysql_error());	
				}
				
?>
<style>

</style>
<div style="margin-top:0px;color:#000" align="center"><h4>Purchase Report</h4></div>
<table width="1280" border="1" align="center" style="color:#000;">
 	<tr style="background:#CCC">
    <th width="37" height="24" scope="col">S.NO</th>
    <th width="260" scope="col">Name</th>
    <th width="120" scope="col" nowrap="nowrap">Product</th>
    <th width="154" scope="col">Product Type</th>
    <th width="145" scope="col">Model</th>
    <th width="128" scope="col">Quantity</th>
    <th colspan="2" scope="col">Price</th>
    <th colspan="2" scope="col">Sales Price</th>
    <th width="45" colspan="3" scope="col" nowrap="nowrap">Date</th>
   </tr>

    <?php 
  		$i=1;
		$t_qty="";
		$total_price="";
		$total_sales_price="";
		$g_pricequnty="";
		$g_salesprice="";
		if($query)
		{
  		while($row=mysql_fetch_array($query))
		{	
			$t_qty+=$row['Quantity'];
			$total_price+=$row['price'];
			$total_sales_price+=$row['sales_price'];
			$g_pricequnty+=$row['Quantity']*$row['price'];
			$g_salesprice+=$row['Quantity']*$row['sales_price'];
  ?>
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><a href="store.php?page=editpurchase&id=<?php echo $row['p_id'];?>"><?php echo $row['name'];?></a></td>
    <td><?php echo $row['product'];?></td>
    <td nowrap="nowrap"><?php echo $row['prd_type'];?></td>
    <td nowrap="nowrap"><?php echo $row['pmodel'];?></td>
    <td><?php echo $row['Quantity'];?></td>
    <td width="77"><?php echo $row['price'];?></td>
    <td width="72"><?php echo $row['Quantity']*$row['price'];?></td>
    <td width="87"><?php echo $row['sales_price'];?></td>
    <td width="76"><?php echo $row['Quantity']*$row['sales_price'];?></td>
    <th colspan="3" scope="col"><?php  echo $row['Date'];?></th>
  </tr>
 <?php $i++;}}?>
</table>
<table width="460" border="1" style="float:right;margin-right:90px;">
  <tr align="center">
   <th width="123" scope="row"><?php echo $t_qty;?></th>
    <th width="72" scope="row"><?php echo $total_price;?></th>
    <th width="69" scope="row"><?php echo $g_pricequnty;?></th>
    <td width="84"><?php echo $total_sales_price;?></td>
    <td width="78"><?php echo $g_salesprice;?></td>
  </tr>
 </table>
<?php }?>
<!---Search result for empty input all record show------->
	<?php
				// asceding and descending
					if(isset($_GET['bymodel']) and $_GET['bymodel']=="desc")
					{
						$_GET['bymodel']="asc";
					}else
			if(isset($_GET['bymodel']) and $_GET['bymodel']=="asc")
					{
					$_GET['bymodel']="desc";
					}
				
    if(empty($_GET['name']) && empty($_GET['product']) &&  empty($_GET['from']) && empty($_GET['to']) && empty($_GET['type']) && empty($_GET['nic']) && empty($_GET['license']) && empty($_GET['weapon']) && empty($_GET['plan']))
		{
			$qry=mysql_query("select * from `purchase` ORDER BY `pmodel` ".$_GET['bymodel']."") or die(mysql_error());
?>
<div style="margin-top:0px;color:#000" align="center"><h4>Purchase Report</h4></div>
<table width="1280" border="1" align="center" style="color:#000;" >
<tr style="position:fixed;background:#CCC;margin-top:-30px;">
<td colspan="11">
<table width="1278" border="1">
<tr>
<th width="37" height="24" scope="col">S.NO</th>
    <th width="260" scope="col">Name</th>
    <th width="100" scope="col">Product</th>
    <th width="230" scope="col">Product Type</th>
    <th width="170" scope="col">
    							<?php if($_GET['bymodel']==""){?><a href="store.php?page=reportpurchase&bymodel=asc">Model</a><?php }?>
    							 <?php if(isset($_GET['bymodel'])=="asc"){?><a href="store.php?page=reportpurchase&bymodel=desc">Model</a><?php }?>
    </th>
    <th width="50" scope="col">Quantity</th>
    <th colspan="2" scope="col" width="50">Price</th>
     <th colspan="2" scope="col" width="65">Sales Price</th>
    <th width="33" colspan="3" scope="col">Date</th>
</tr>
</table>
</td>
</tr>
 
  <?php 
  		$i=1;
		$t_qty="";
		$t_price="";
		$s_price="";
		$g_qunprice="";
		$g_qunsalesprice="";
		if($qry)
		{
  		while($row1=mysql_fetch_array($qry))
		{
  			$t_qty+=$row1['Quantity'];
			$t_price+=$row1['price'];
			$s_price+=$row1['sales_price'];
			$g_qunprice+=$row1['Quantity']*$row1['price'];
			$g_qunsalesprice+=$row1['Quantity']*$row1['sales_price'];
  ?>
 
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><a href="store.php?page=editpurchase&id=<?php echo $row1['p_id'];?>"><?php echo $row1['name'];?></a></td>
    <td nowrap="nowrap"><?php echo $row1['product'];?></td>
    <td><?php echo $row1['prd_type'];?></td>
     <td nowrap="nowrap"><?php echo $row1['pmodel'];?></td>
    <td><?php echo $row1['Quantity'];?></td>
    <td width="72"><?php echo $row1['price'];?></td>
    <td width="65"><?php echo $row1['Quantity']*$row1['price'];?></td>
     <td width="90"><?php echo $row1['sales_price'];?></td>
     <td width="76"><?php echo $row1['Quantity']*$row1['sales_price'];?></td>
<th colspan="3" scope="col" nowrap="nowrap"><?php  echo $row1['Date'];?></th>
  </tr>
  <?php $i++;}?>
 
</table>
<?php }?>
<table width="365" border="1" style="float:right;margin-right:100px;">
  <tr align="center">
    <th width="46" scope="row"><strong><?php echo $t_qty;?></strong></th>
    <th width="63" scope="row"><strong><?php echo $t_price;?></strong></th>
    <th width="65" scope="row"><?php echo $g_qunprice;?></th>
    <td width="82"><strong><?php echo $s_price;?></strong></td>
    <td width="75"><?php echo $g_qunsalesprice;?></td>
  </tr>
 </table>
<?php }?>