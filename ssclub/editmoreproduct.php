<?php
		// fetch record to fields	
			if(isset($_GET['s_id']))
			{
				$s_id=$_GET['s_id'];
				$query=mysql_query("select * from `sale_bill2` where `bill2_id`='$s_id'") or die();
				$row1=mysql_fetch_array($query);
				$old_product=$row1['product'];
				$old_type=$row1['p_type'];
				$old_model=$row1['p_model'];
		   }
		   // update records
		   if(isset($_POST['submit']))
			{
				$s_id=$_GET['s_id'];
				$sid=$_GET['sid'];
				$product=$_POST['product'];
				$p_type=$_POST['subproduct'];
				$p_model=$_POST['pmodel'];
				$quantity=$_POST['quantity'];
				$rate=$_POST['rate'];
				$total=$_POST['total'];
				$details=$_POST['details'];
				
				if($product=="")
				{
					$product=$old_product;
				}
				if($p_type=="")
				{
					$p_type=$old_type;	
				}
				if($p_model=="")
				{
					$p_model=$old_model;	
				}
				
				mysql_query("update `sale_bill2` set `product`='$product',`p_type`='$p_type',`p_model`='$p_model',`qty`='$quantity',`rate`='$rate',`total`='$total',`details`='$details' where `bill2_id`='$s_id'") or die(mysql_error());
				header("Location:store.php?page=addmoreproduct&sid=$sid&msg=Record Updated");
				}

?>
<div align="center" style="color:#000"><strong>ADD MORE SALES</strong></div>
<form name="form1" method="post" action="">
  <table width="90%" border="1" align="center" style="color:#000;margin-top:30px;">
    <tr align="center">
      <th width="115" height="42" scope="row">Product Name</th>
           
      <td width="299"><select name="product" id="product" onchange="getprodcut(this.value)">
      
              
        <option value="">--Select Option--</option>
          <?php $checked = $row1['product']; ?>
        <option <?php if($checked == 'Acessories') {echo 'selected=selected';} ?> value="Acessories">--Acessories--</option>
        <option <?php if($checked == 'Fire Arms') {echo 'selected=selected';} ?> value="Fire Arms">--Fire Arms--</option>
        <option <?php if($checked == 'Ammunition') {echo 'selected=selected';} ?> value="Ammunition">--Ammunition--</option>
        <option <?php if($checked == 'Air Rifle') {echo 'selected=selected';} ?> value="Air Rifle">--Air Rifle--</option>
      </select></td>
     
      <td width="217" align="center"><strong>Product Type</strong></td>
      <td width="440"  nowrap="nowrap"><?php if(isset($_GET['s_id'])){ echo $row1['p_type'].' / ';}if(isset($_GET['s_id'])){ echo $row1['p_model'];}?><div id="subcat1"></div></td>
    </tr>
    <tr>
        <td align="center"><strong>Prd Code</strong></td>
     <td><input type="text" name="pcode" id="pcode" oninput="getpro(this.value)"></td>
    </tr>
  </table>
  <table width="90%" border="1" align="center" style="color:#000;margin-top:30px;">
    <tr>
      <th width="153" scope="col">Weapon #</th>
      <th width="153" scope="col">Quantity</th>
      <th width="146" scope="col">Rate</th>
      <th width="156" scope="col">Total</th>
      <th width="201" scope="col">Details</th>
    </tr>
    <tr align="center">
      <td><input type="text" name="weapon" id="weapon"  oninput="tot()" value="<?php if(isset($s_id)){echo $row1['qty'];}?>"></td>
      <td><input type="text" name="quantity" id="quantity"  oninput="tot()" value="<?php if(isset($s_id)){echo $row1['qty'];}?>"></td>
      <td><input type="text" name="rate" id="rate"  oninput="tot()" value="<?php if(isset($s_id)){echo $row1['rate'];}?>"></td>
      <td><input type="text" name="total" id="total" value="<?php if(isset($s_id)){echo $row1['total'];}?>"></td>
      <td><input type="text" name="details" id="details" value="<?php if(isset($s_id)){echo $row1['details'];}?>"></td>
    </tr>
  </table>
	<div align="center" style="margin-top:50px;"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Save"><span style="margin-left:20px;"><a href="store.php?page=salesbill&sid=<?php echo $_GET['sid'];?>"><input type="button"  class="btn btn-large btn-primary" value="Generate Bill" style="background-color:#666"></a></span></div>
</form>