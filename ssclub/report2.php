<?php
			error_reporting(0);
			if($_GET['name'] || $_GET['to'] || $_GET['from'] || $_GET['nic'] || $_GET['membership'] || $_GET['licenseno'])
			{
				$name=$_GET['name'];
				$membership=$_GET['membership'];
				$licenseno=$_GET['licenseno'];
				$from=$_GET['from'];
				$to=$_GET['to'];
				$nic=$_GET['nic'];
				
				if($name)
				{
					$sql=mysql_query("select * from `sales` where `Cname`LIKE '$name%'") or die();
					
				}
				if($name && $to)
				{
					$sql=mysql_query("select * from `sales` where `Cname`='$name' AND `Date`='$to'") or die();	
				}
				if($name && $from)
				{
					$sql=mysql_query("select * from `sales` where `Cname`='$name' AND `Date`>='$from'") or die();	
				}
				if($name && $from && $to)
				{
					$sql=mysql_query("select * from `sales` where `Cname`='$name' AND `Date`>='$from' AND `Date`<='$to' ") or die();	
				}
				if($nic && $to)
				{
					$sql=mysql_query("select * from `sales` where `NIC`='$nic' AND `Date`='$to' ") or die();	
				}
				if($nic && $from)
				{
					$sql=mysql_query("select * from `sales` where `NIC`='$nic' AND `Date`>='$from' ") or die();
				}
				if($membership && $to)
				{
					$sql=mysql_query("select * from `sales` where `membership`='$membership' AND `Date`='$to'") or die();	
				}
				if($membership && $from)
				{
					$sql=mysql_query("select * from `sales` where `membership`='$membership' AND `Date`>='$from'") or die();	
				}
				if($licenseno && $to)
				{
					$sql=mysql_query("select * from `sales` where `LicenseNo`='$licenseno' AND `Date`='$to'") or die();
				}
				if($licenseno && $from)
				{
					$sql=mysql_query("select * from `sales` where `LicenseNo`='$licenseno' AND `Date`>='$from'") or die();
				}
				
					
			}
?>s
<div class="main"><h1>Sales Report</h1></div>
<table class="responstable">
    <tr class="sticky">
    <th>SNO</th>
    <th>Bill#</th>
    <th>Name</th>
    <th>Product</th>
    <th>Type</th>
    <th>Model</th>
    <th>License #</th>
    <th>Weapon No</th>
    <th>QTY</th>
    <th>Rate</th>
    <th>Total</th>
    <th>Pr Price</th>
    <th>Date</th>
  </tr>
  <?php
  			$i=1;
			// varibile for total
			$qty1="";
			$qty2="";
			$rate1="";
			$rate2="";
			$tot1="";
			$tot2="";
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
    <td width="60"><?php echo $row['weapon_no'];?></td>
    <td><?php echo $row['Quantity'];?></td>
    <td><?php echo $row['Amount'];?></td>
    <td><?php echo $row['total'];?></td>
    <td><?php echo $row6['price']*$row['Quantity'];?></td>
    <td><?php echo $row['Date'];?></td>
  </tr>
  <?php $i++;?>
    
    <?php
    			
				$sid=$row['Sid'];
				$qry=mysql_query("select * from `sale_bill2` where `s_id`='$sid'") or die();
				while($row1=mysql_fetch_array($qry))
				{
				$product2=$row1['product'];
				$type2=$row1['p_type'];
				$model2=$row1['p_model'];
				$qty2+=$row1['qty'];
				$rate2+=$row1['rate'];
				$tot2+=$row1['total'];
				// get bill number from salesbill
				$qy1=mysql_query("select * from `salesbill` where `s_id`='$sid'") or die();
				$qyrow1=mysql_fetch_array($qy1);
				// query to fetch purchase price
			$query3=mysql_query("select * from `purchase` where `product`='$product2' AND `prd_type`='$type2' AND `pmodel`='$model2' ORDER BY `p_id` DESC") or die(mysql_error());
			$row7=mysql_fetch_array($query3);
			
			 $price2+=$row7['price']*$row1['qty'];
	?>
  <!----second row in second table name and date check--->
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $qyrow1['sb_id'];?></td>
    <td><a href="store.php?page=editsale&id=<?php echo $row['Sid'];?>"><?php echo $row['Cname'];?></a></td>
    <td><?php echo $row1['product'];?></td>
    <td><?php echo $row1['p_type'];?></td>
    <td><?php echo $row1['p_model'];?></td>
    <td><?php echo $row['LicenseNo'];?></td>
    <td width="60"><?php echo $row1['weapon_no'];?></td>
    <td><?php echo $row1['qty'];?></td>
    <td><?php echo $row1['rate'];?></td>
    <td><?php echo $row1['total'];?></td>
    <td><?php echo $row7['price']*$row1['qty'];?></td>
    <td><?php echo $row['Date'];?></td>
    <?php $i++;}}?>
  </tr>
  </table>
  <!----total tables---->
  <table style="width: 400px;margin: 0 auto;" class="responstable">
    <tr>
        <td>Qty</td>
        <td>Rate</td>
        <td>Total</td>
        <td>Purchase price</td>
    </tr>
  <tr>
    <td><?php echo $qty1+$qty2;?></td>
    <td><?php echo $rate1+$rate2;?></td>
    <td><?php echo $tot1+$tot2;?></td>
    <td><?php  echo $price1+$price2;?></td>
  </tr>
</table>
  <br>
  <script>
//var stickyOffset = $('#sticky').offset().top;
    $(window).scroll(function(){
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();

  if (scroll >= 300) sticky.addClass('fixed2');
  else sticky.removeClass('fixed2');
});


</script>