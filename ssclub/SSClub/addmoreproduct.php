<?php
						// insert more sales 
			if(isset($_POST['submit']))
			{
				$sid=$_GET['sid'];
				$product=$_POST['product'];
				$p_type=$_POST['subproduct'];
				$p_model=$_POST['pmodel'];
				$weapon_no=$_POST['weapon'];
				$quantity=$_POST['quantity'];
				$rate=$_POST['rate'];
				$total=$_POST['total'];
				$details=$_POST['details'];
				
				if($product!="" && $p_type!="" && $p_model!="")
				{
				mysql_query("insert into `sale_bill2` values('','$product','$p_type','$p_model','$weapon_no','$quantity','$rate','$total','$details','$sid')") or die(mysql_error());
				header("Location:store.php?page=addmoreproduct&sid=$sid&msg=Record Insert Successfully");
				}
				
				
			}

?>
<div align="center" style="color:#00C"><strong><?php if(isset($_GET['msg'])){ echo $_GET['msg'];}?></strong></div>
<div align="center" style="color:#000"><strong>ADD MORE SALES</strong></div>
<form name="form1" method="post" action="">
  <table width="90%" border="1" align="center" style="color:#000;margin-top:30px;">
    <tr align="center">
      <th width="115" height="42" scope="row">Product Name</th>
      <td width="299"><select name="product" id="product" onchange="getprodcut(this.value)" required>
        <option selected="selected"  value="">--Select Option--</option>
        <option value="Acessories">--Acessories--</option>
        <option value="Fire Arms">--Fire Arms--</option>
        <option value="Ammunition">--Ammunition--</option>
        <option value="Air Rifle">--Air Rifle--</option>
      </select></td>
      <td width="217" align="center"><strong>Product Type</strong></td>
      <td width="440"  nowrap="nowrap"><div id="subcat1"></div></td>
    </tr>
  </table>
  <table width="90%" border="1" align="center" style="color:#000;margin-top:30px;">
    <tr>
      <th width="138" scope="col" nowrap="nowrap">Weapon Number</th>
      <th width="183" scope="col">Quantity</th>
      <th width="218" scope="col">Rate</th>
      <th width="202" scope="col">Total</th>
      <th width="199" scope="col">Details</th>
    </tr>
    <tr align="center">
      <td><input type="text" name="weapon" id="weapon" oninput="getWeaponno(this.value)"/></td>
      <td><input type="text" name="quantity" id="quantity"  oninput="tot()" value="" required="required" /></td>
      <td><input type="text" name="rate" id="rate"  oninput="tot()" value="" required></td>
      <td><input type="text" name="total" id="total" value="" required></td>
      <td><input type="text" name="details" id="details" value=""></td>
    </tr>
  </table>
  <div align="center" style="margin-top:50px;"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Save"><span style="margin-left:20px;"><a href="store.php?page=salesbill2&sid=<?php echo $_GET['sid'];?>"><input type="button"  class="btn btn-large btn-primary" value="Generate Bill" style="background-color:#666"></a></span></div>
</form>
<div align="center" style="color:#000">
<?php
		if(isset($_GET['sid']))
			{
				$s_id=$_GET['sid'];
				$qry=mysql_query("select * from `sale_bill2` where `s_id`='$s_id'") or die();
				
			
?>
  <table width="1188" border="1">
    <tr>
      <th width="61" height="26" scope="col">S.NO</th>
      <th width="110" scope="col">Product</th>
      <th width="155" scope="col">Product Type</th>
      <th width="123" scope="col">Product Model</th>
      <th width="116" scope="col">Quantity</th>
      <th width="126" scope="col">Rate</th>
      <th width="133" scope="col">Total</th>
      <th width="143" scope="col">Action</th>
       <th width="163" scope="col">Action</th>
      
    </tr>
    <?php 
			$qry1=mysql_query("select * from `sales` where `Sid`='$s_id'") or die();
			$row1=mysql_fetch_array($qry1);
			
			
	?>
    <tr align="center">
      <td><?php echo $i=1;?></td>
      <td><?php echo $row1['Product'];?></td>
      <td><?php echo $row1['SubProduct'];?></td>
      <td><?php echo $row1['pmodel'];?></td>
      <td><?php echo $row1['Quantity'];?></td>
      <td><?php echo $row1['Amount'];?></td>
      <td><?php echo $row1['total'];?></td>
       <td><a href="store.php?page=sales&s_id=<?php echo $row1['Sid'];?>">Edit</a></td>
       <td><!--<a href="delete.php?s_id=<?php //echo $row1['Sid'];?>&sid=<?php //echo $_GET['sid']?>">Delete</a>-->Delete</td>
    </tr>
    <?php
    		$i=2;
			$qunty="";
			$g_rate="";
			$g_total="";
			while($row=mysql_fetch_array($qry))
			{
				$qunty+=$row['qty'];
				$g_rate+=$row['rate'];
				$g_total+=$row['total'];	
	?>
    <tr align="center">
      <td><?php echo $i;?></td>
      <td><?php echo $row['product'];?></td>
      <td><?php echo $row['p_type'];?></td>
      <td><?php echo $row['p_model'];?></td>
      <td><?php echo $row['qty'];?></td>
      <td><?php echo $row['rate'];?></td>
      <td><?php echo $row['total'];?></td>
       <td><a href="store.php?page=editmoreproduct&s_id=<?php echo $row['bill2_id'];?>&sid=<?php echo $_GET['sid']?>">Edit</a></td>
       <td><a href="delete.php?s_id=<?php echo $row['bill2_id'];?>&sid=<?php echo $_GET['sid']?>">Delete</a></td>
    </tr>
    <?php $i++;}}?>
  </table>
  <table width="400" border="1" style="margin-left:150px;">
    <tr>
      <th width="120" scope="col"><?php echo $qunty+$row1['Quantity'];?></th>
      <th width="125" scope="col"><?php echo $g_rate+$row1['Amount'];?></th>
      <th width="133" scope="col"><?php echo $g_total+$row1['total'];?></th>
    </tr>
  </table>
</div>
