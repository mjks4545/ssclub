<?php require_once('function.php'); 
	  error_reporting(0);
	  $qty="";
	  $qty1="";
	  $qty2="";
?>
<?php
		if(isset($_GET['id']))
			{
				$product=$_GET['id'];
				$qry=mysql_query("select SUM(Quantity),prd_type from `purchase` where `product`='$product' GROUP BY `prd_type`");	
?>

  <select name="subproduct" id="subproduct" onchange="getmodel(this.value)">
  		<option value="">--Product Type----</option>
        <?php while($row=mysql_fetch_array($qry))
				{
					$ptype=$row['prd_type'];
					$p_name=$row['product'];
					//$pmodel=$row['pmodel'];
					$qty=$row[0];
					// purchase Quantity
					//$qry1=mysql_query("select SUM(Quantity) from `purchase` where `product`='$p_name' AND `prd_type`='$ptype' AND `pmodel`='$pmodel'") or die();
					//$result=mysql_fetch_array($qry1);
					//$qty=$result[0];
					// sales quantity 1st table
					$qry2=mysql_query("select SUM(Quantity) from `sales` where `Product`='$p_name' AND `SubProduct`='$ptype'") or die();
					$result1=mysql_fetch_array($qry2);
					 $qty1=$result1[0];
					//sales2 quatity from 2nd table
					$qry3=mysql_query("select SUM(qty) from `sale_bill2` where `product`='$p_name' AND `p_type`='$ptype'") or die();
					$result2=mysql_fetch_array($qry3);
					$qty2=$result2[0];
					
					$t_qty=$qty-$qty1-$qty2;
					if($t_qty>0 && $ptype==$row['prd_type'])
					{
		?>
        <option value="<?php echo $row['prd_type'];?>">---<?php echo $row['prd_type'];?>---</option>
        <?php }}?>
  </select>

 <span id="model"></sapn> 
 <?php }?>
 <?php  echo $qty1;?>