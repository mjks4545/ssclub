<?php
		if($_GET['product'] || $_GET['type'] || $_GET['pmodel'])
		 {
			$product=$_GET['product'];
			$type=$_GET['type'];
			$pmodel=$_GET['pmodel'];
			
			$qry=mysql_query("select * from `purchase` where `product`='$product' AND `prd_type`='$type' AND `pmodel`='$pmodel'") or die();
			
?>
<div align="center" style="color:#000;font-size:16px;font-weight:bold;margin-bottom:20px;">Weapon Numbers</div>
<table width="705" border="1" align="center" style="color:#000">
  <tr style="background:#CCC">
    <th width="68" height="37" scope="col">S.NO</th>
    <th width="142" scope="col">Product</th>
    <th width="139" scope="col">Type</th>
    <th width="163" scope="col">Model</th>
    <th width="159" scope="col">WeaponNo</th>
  </tr>
  <?php
  		$i=1;
		while($row=mysql_fetch_array($qry))
		{
			// purchase records
			 $p_name=$row['product'];
			 $p_type=$row['prd_type'];
			 $p_model=$row['pmodel'];
			 $qty1=$row['Quantity'];
			 $weapon_no=$row['weapone_no'];
			 
			// sales product 1
		$qry1=mysql_query("select * from `sales` where `Product`='$p_name' AND `SubProduct`='$p_type' AND `pmodel`='$p_model'") or die();
		$row1=mysql_fetch_array($qry1);
		$qty2=$row1['Quantity'];
		$weapon_no1=$row1['weapon_no'];
		
		// sales product 2
		$qry2=mysql_query("select * from `sale_bill2` where `product`='$p_name' AND `p_type`='$p_type' AND `p_model`='$p_model'") or die();
		$row2=mysql_fetch_array($qry2);
		$qty3=$row2['qty'];
		$weapon_no2=$row2['weapon_no'];
		
		// total qty
		$tqty=$qty1-$qty2-$qty3;
		if($tqty>0)
		{
?>
  <tr align="center">
    <td height="26"><?php echo $i;?></td>
    <td><?php echo $p_name;?></td>
    <td><?php echo $p_type;?></td>
    <td><?php echo $p_model;?></td>
    <td><?php echo $row['weapone_no'];?></td>
  </tr>
  <?php $i++;}}?>
</table>
<?php }?>
