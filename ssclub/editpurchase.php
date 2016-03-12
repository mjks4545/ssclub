<?php
				if(isset($_GET['id']))
				{
					$id=$_GET['id'];
					$query=mysql_query("select * from `purchase` where `p_id`='$id'") or die();
					$row=mysql_fetch_array($query);	
				}

?>
<div style="color:#000;margin-top:20px;margin-bottom:30px;" align="center"><strong>Purchase Result For &nbsp;: <?php echo Strtoupper($row['name']);?></strong></div>
<table width="1074" border="1" align="center" style="color:#000;font-size:16px;">
  <tr align="center">
    <th width="140" height="47" scope="row">Name</th>
    <td width="319"><?php echo $row['name'];?></td>
    <td width="207"><strong>CNIC</strong></td>
    <td colspan="3"><?php  echo $row['cnic'];?></td>
  </tr>
  <tr align="center">
    <th height="50" scope="row">Address</th>
    <td><?php echo $row['address'];?></td>
    <td><strong>Phone No</strong></td>
    <td colspan="3"><?php echo $row['phone'];?></td>
  </tr>
  <tr align="center">
    <th height="47" scope="row"><strong>Product</strong></th>
    <td><?php echo $row['product'];?></td>
    <td><strong>Product Type</strong></td>
    <td width="123"><?php echo $row['prd_type'];?></td>
    <td width="104"><strong>Product Model</strong></td>
    <td width="141"><?php echo $row['pmodel'];?></td>
  </tr>
  <tr align="center">
    <th height="34" scope="row">Weapon NO</th>
    <td><?php echo $row['weapone_no'];?></td>
    <td><strong>License NO</strong></td>
    <td colspan="3"><?php echo $row['license_no'];?></td>
  </tr>
  <tr align="center">
    <th height="31" scope="row">Plan</th>
    <td><?php echo $row['plan'];?></td>
    <td><strong>Date</strong></td>
    <td colspan="3"><?php echo $row['Date'];?></td>
  </tr>
  <tr align="center">
    <th height="37" scope="row">Quantity</th>
    <td><?php echo $row['Quantity'];?></td>
    <td><strong>Price</strong></td>
    <td colspan="3"><?php echo $row['price'];?></td>
  </tr>
  <tr align="center">
    <th height="38" scope="row">Sale Price</th>
    <td><?php echo $row['sales_price'];?></td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
