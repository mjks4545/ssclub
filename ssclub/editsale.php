<?php
            			if(isset($_GET['id']))
						{
							$id=$_GET['id'];
							$query=mysql_query("select * from `sales` where `Sid`='$id'") or die();
							$row=mysql_fetch_array($query);			
						}
						if(isset($_POST['submit']))
						{
							$id=$_GET['id'];
							header("Location:store.php?page=salebillreport&id=$id");	
						}
			?>

<div align="center" style="color:#000"><strong>Sales Result For :&nbsp;&nbsp;<?php echo Strtoupper($row['Cname']);?></strong></div>
<table width="928" border="1" align="center" style="color:#000;margin-top:40px;font-size:16px">
  <tr align="center">
    <th width="145" height="44" scope="row">Name</th>
    <td width="298"><?php echo $row['Cname'];?></td>
    <td width="152"><strong>CNIC</strong></td>
    <td width="305"><?php echo $row['NIC'];?></td>
  </tr>
  <tr align="center">
    <th height="41" scope="row">Mobile NO</th>
    <td><?php echo $row['MobileNo'];?></td>
    <td><strong>Address</strong></td>
    <td><?php echo $row['Address'];?></td>
  </tr>
  <tr align="center">
    <th height="40" scope="row">License NO</th>
    <td><?php echo $row['LicenseNo'];?></td>
    <td><strong>Membership</strong></td>
    <td nowrap="nowrap"><?php echo $row['membership'];?></td>
  </tr>
  <tr align="center">
    <th height="44" scope="row"><strong>Details</strong></th>
    <td><?php echo $row['Details'];?></td>
    <td><strong>Date</strong></td>
    <td><?php echo $row['Date'];?></td>
  </tr>
</table>
	<?php
    	$id=$_GET['id'];
		$query2=mysql_query("select * from `sale_bill2` where `s_id`='$id'") or die();
		$num=mysql_num_rows($query2);
		
		
	?>
<table width="927" border="1" align="center" style="color:#000;margin-top:15px;">
  <tr style="background-color:#CCC">
    <th width="120" height="32" scope="col">Product</th>
    <th width="148" scope="col">Prodcut Tye</th>
    <th width="142" scope="col">Product Model</th>
    <th width="101" scope="col">Weapon NO</th>
    <th width="111" scope="col">Quantity</th>
    <th width="113" scope="col">Rate</th>
    <th width="146" scope="col">Total</th>
  </tr>
 
  <tr align="center">
    <td height="11"><?php echo $row['Product'];?></td>
    <td><?php echo $row['SubProduct'];?></td>
    <td><?php echo $row['pmodel'];?></td>
    <td><?php echo $row['weapon_no'];?></td>
    <td><?php echo $row['Quantity'];?></td>
    <td><?php echo $row['Amount'];?></td>
    <td><?php echo $row['total'];?></td>
  </tr>
  <?php
    		
			while($row1=mysql_fetch_array($query2))
			{
			
	?>
  <tr align="center">
    <td height="12"><?php echo $row1['product'];?></td>
    <td><?php echo $row1['p_type'];?></td>
    <td><?php echo $row1['p_model'];?></td>
    <td><?php echo $row1['weapon_no'];?></td>
    <td><?php echo $row1['qty'];?></td>
    <td><?php echo $row1['rate'];?></td>
    <td><?php echo $row1['total'];?></td>
  </tr>
  <?php }?>
</table>

</div>
<form action="" method="post">
<input type="hidden" value="<?php if(isset($_GET['id'])) { echo  $_GET['id'];}?>" name="id">
<div align="center" style="margin-top:10px;"><input name="submit" type="submit" class="btn btn-large btn-primary" id="submit" value="View Bill">
<?php
		if($_SESSION['Role']=='administrator')
		{
?>
<a href="delete.php?sales_id=<?php echo $id;?>" onclick="return confirm('Are You Sure To Delete This BIll?');" class="btn btn-large btn-primary">Delete BIll</a>

<?php }?>
</div>
</form>