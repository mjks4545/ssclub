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
<div class="main">
    <h1 style="width:369px;">Purchase Report</h1>
</div>
<table class="responstable">
 	<tr>
    <th>S.NO</th>
    <th>Name</th>
    <th>Product</th>
    <th>Product Type</th>
    <th>Weapon No</th>
    <th>Status</th>
    <th>Model</th>
    <th>Quantity</th>
    <th colspan="2">Price</th>
    <th colspan="2">Sales Price</th>
    <th>Date</th>
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
  <tr>
    <td><?php echo $i;?></td>
    <td><a href="store.php?page=editpurchase&id=<?php echo $row['p_id'];?>"><?php echo $row['name'];?></a></td>
    <td><?php echo $row['product'];?></td>
    <td><?php echo $row['prd_type'];?></td>
    <td><?php echo $row['weapone_no'];?></td>
    <td><?php echo $row['remarks'];?></td>
    <td><?php echo $row['pmodel'];?></td>
    <td><?php echo $row['Quantity'];?></td>
    <td><?php echo $row['price'];?></td>
    <td><?php echo $row['Quantity']*$row['price'];?></td>
    <td><?php echo $row['sales_price'];?></td>
    <td><?php echo $row['Quantity']*$row['sales_price'];?></td>
    <td><?php  echo $row['Date'];?></td>
  </tr>
 <?php $i++;}}?>
</table>
<table style="width:380px;margin: 0px auto;" class="responstable">
    <br>
    <tr>
        <td>Qty</td>
        <td colspan="2">Price</td>
        <td colspan="2">Sales Price</td>
    </tr>
  <tr>
   <td><?php echo $t_qty;?></td>
    <td><?php echo $total_price;?></td>
    <td><?php echo $g_pricequnty;?></td>
    <td><?php echo $total_sales_price;?></td>
    <td><?php echo $g_salesprice;?></td>
  </tr>
 </table>
<br>
<?php }?>
<!---Search result for empty input all record show-------->
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
<div class="main">
    <h1 style="width: 361px;">Purchase Report</h1>
</div>
<table class="responstable" >
<tr class="sticky">
    <th>SNO</th>
    <th>Name</th>
    <th>Product</th>
    <th>Product Type</th>
    <th>Weapon No</th>
    <th>Status</th>
    <th>
    							<?php if($_GET['bymodel']==""){?><a style="color:white;" href="store.php?page=reportpurchase&bymodel=asc">Model</a><?php }?>
    							 <?php if(isset($_GET['bymodel'])=="asc"){?><a style="color:white;" href="store.php?page=reportpurchase&bymodel=desc">Model</a><?php }?>
    </th>
    <th>QTY</th>
    <th colspan="2">Price</th>
    <th colspan="2">Sales Price</th>
    <th>Date</th>
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
 
  <tr>
    <td><?php echo $i;?></td>
    <td><a href="store.php?page=editpurchase&id=<?php echo $row1['p_id'];?>"><?php echo $row1['name'];?></a></td>
    <td><?php echo $row1['product'];?></td>
    <td><?php echo $row1['prd_type'];?></td>
    <td><?php echo $row1['weapone_no'];?></td>
    <td><?php echo $row1['remarks'];?></td>
     <td><?php echo $row1['pmodel'];?></td>
    <td><?php echo $row1['Quantity'];?></td>
    <td><?php echo $row1['price'];?></td>
    <td><?php echo $row1['Quantity']*$row1['price'];?></td>
     <td><?php echo $row1['sales_price'];?></td>
     <td><?php echo $row1['Quantity']*$row1['sales_price'];?></td>
    <td><?php  echo $row1['Date'];?></td>
  </tr>
  <?php $i++;}?>
 
</table>
<?php }?>
<table style="width: 472px;margin: 0px auto;" class="responstable">
    <tr>
        <td>Qty</td>
        <td colspan="2">Price</td>
        <td colspan="2">Sales Price</td>
    </tr>
  <tr>
    <td><?php echo $t_qty;?></td>
    <td><?php echo $t_price;?></td>
    <td><?php echo $g_qunprice;?></td>
    <td><?php echo $s_price;?></td>
    <td><?php echo $g_qunsalesprice;?></td>
  </tr>
 </table>
<br>
<?php }?>

<script>
//var stickyOffset = $('#sticky').offset().top;
    $(window).scroll(function(){
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();

  if (scroll >= 300) sticky.addClass('fixed4');
  else sticky.removeClass('fixed4');
});


</script>