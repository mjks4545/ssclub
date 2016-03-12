<?php			
				
				error_reporting(0);
				$old_mebership="";
				// get varibale from gottosales 
				if(isset($_GET['nic']))
				{
					$idcard=$_GET['nic'];
					$qry=mysql_query("select * from `sales` where `NIC`='$idcard' ORDER BY `Sid` DESC") or die();
					$row=mysql_fetch_array($qry);
					$NIC=$row['NIC'];
					$nic_membership=$row['membership'];
					
				}
				// get sales_id to fetch record
				if(isset($_GET['s_id']))
				{
					$sal_id=$_GET['s_id'];
					$qry1=mysql_query("select * from `sales` where  `Sid`='$sal_id' ORDER BY `Sid` DESC") or die();	
					$row1=mysql_fetch_array($qry1);
					$old_product=$row1['Product'];
					$old_subpro=$row1['SubProduct'];
					$old_model=$row1['pmodel'];
					$old_mebership=$row1['membership'];
				}
				// update query
				if(isset($_POST['update']))
				{
					$cname=$_POST['cname'];
					$nic=ltrim($_POST['nic']);
					$mobile=ltrim($_POST['mobile']);
					$address=$_POST['address'];
					$amount=ltrim($_POST['amount']);
					$Product=$_POST['product'];
					$subproduct=$_POST['subproduct'];
					$pmodel=$_POST['pmodel'];
					
					$LicenseNo=$_POST['LicenseNo'];
					$quantity=ltrim($_POST['quantity']);
					$balance=ltrim($_POST['total']);
					$details=$_POST['details'];
					$weapon=$_POST['weapon'];
					$date=date("Y-m-d");
					$membership=$_POST['membership'];
					
					if($Product=="")
					{
						$Product=$old_product;	
					}
					if($subproduct=="")
					{
						$subproduct=$old_subpro;	
					}
					if($pmodel=="")
					{
						$pmodel=$old_model;	
					}
					if($membership=="")
					{
						$membership=$old_mebership;	
					}
					
					mysql_query("update `sales` set `Cname`='$cname',`NIC`='$nic',`MobileNo`='$mobile',`Address`='$address',`Product`='$Product',`SubProduct`='$subproduct',`pmodel`='$pmodel',`LicenseNo`='$LicenseNo',`weapon_no`='$weapon',`membership`='$membership',`Quantity`='$quantity',`Amount`='$amount',`total`='$balance',`Details`='$details',`Date`='$date' where `Sid`='$sal_id'") or die();
					header("Location:store.php?page=addmoreproduct&sid=$sal_id&msg=Record Updated");
						
				}
				
                
				
				$s_id="";
				$date=date("Y-m-d");
				
			// insertion into sales
				if(isset($_POST['submit']))
				{
					$cname=$_POST['cname'];
					$nic=ltrim($_POST['nic']);
					$mobile=ltrim($_POST['mobile']);
					$address=$_POST['address'];
					$amount=ltrim($_POST['amount']);
					$Product=$_POST['product'];
					$subproduct=$_POST['subproduct'];
					$pmodel=$_POST['pmodel'];
					
					$LicenseNo=$_POST['LicenseNo'];
					$quantity=ltrim($_POST['quantity']);
					$balance=ltrim($_POST['total']);
					$details=$_POST['details'];
					$weapon=$_POST['weapon'];
					$date=date("Y-m-d");
					$membership=$_POST['membership'];
					
					
					
					if($cname!="" && $amount!="" && $Product!="" && $details!="" && $subproduct!="")
					{
						
						mysql_query("insert into `sales` values ('','$cname','$nic','$mobile','$address','$Product','$subproduct','$pmodel','$LicenseNo','$weapon','$membership','$quantity','$amount','$balance','$details','$date')") or die(mysql_error());
						$sales_id=mysql_insert_id();
						header("Location:store.php?page=addmoreproduct&sid=$sales_id&msg=Record Insert Successfully");
					}
					}
				
				 
?>
<div style="color:#06F;margin-top:0px;" align="center"><strong><?php if(isset($_GET['msg'])) { echo $_GET['msg'];}?></strong></div>
<div align="center" style="color:#000;"><span style="margin-right:700px;"><a href="store.php?page=settax"><input type="button" name="submit" class="btn btn-large btn-primary" value="Set Tax"></a></span><strong><h3>Sales</h3></strong></div>
<form name="form1" method="post" action="">

  <table width="1163" border="1" align="center" style="color:#000;font-size:16px">
    <tr>
      <th width="191" height="34" scope="row"> Name</th>
      <td width="355"><input type="text" name="cname" id="cname" value="<?php if(isset($_GET['nic'])){ echo $row['Cname'];}else if(isset($_GET['s_id'])){ echo $row1['Cname'];}?>" autofocus required/></td>
      <td width="173" align="center"><strong>CNIC</strong></td>
      <td width="416"><input type="text" name="nic" id="nic" value="<?php if(isset($_GET['nic'])){ echo $_GET['nic'];} else if(isset($_GET['s_id'])){ echo $row1['NIC'];}?>" required/></td>
    </tr>
    <tr>
      <th height="35" scope="row" ><strong>Moble NO</strong></th>
      <td><input type="text" name="mobile" id="mobile" value="<?php if(isset($_GET['nic'])){echo $row['MobileNo'];}else if(isset($_GET['s_id'])){ echo $row1['MobileNo'];}?>" required/></td>
      <td align="center"><strong>Address</strong></td>
      <td><input type="text" name="address" id="address" value="<?php if(isset($_GET['nic'])){ echo $row['Address'];}else if(isset($_GET['s_id'])){ echo $row1['Address'];}?>" required/></td>
    </tr>
    <tr>
      <th height="16" scope="row">Product</th>
      <td>
      	<select name="product" id="product" onchange="getSub(this.value)">
     	<option selected="selected"  value="">--Select Option--</option>
        <?php $checked = $row1['Product']; ?>
      	<option <?php if($checked == 'Acessories') {echo 'selected=selected';} ?> value="Acessories">--Acessories--</option>
      	<option <?php if($checked == 'Fire Arms') {echo 'selected=selected';} ?> value="Fire Arms">--Fire Arms--</option>
      	<option <?php if($checked == 'Ammunition') {echo 'selected=selected';} ?> value="Ammunition">--Ammunition--</option>
         <option <?php if($checked == 'Air Rifle') {echo 'selected=selected';} ?> value="Air Rifle">--Air Rifle--</option>
   		 </select>
         
         </td>
      <td align="center"><strong>Product Type</strong></td>
      <td nowrap="nowrap"><span><?php if(isset($_GET['s_id'])){echo $row1['SubProduct'].'&nbsp;&nbsp;/&nbsp;&nbsp;'; echo $row1['pmodel'].'&nbsp;';}?></span><div id="subcat"></div></td>
    </tr>
    <tr>
      <th height="16" scope="row"><strong>License No</strong></th>
      <td><input type="text" name="LicenseNo" id="LicenseNo" value="<?php if(isset($_GET['nic'])){ echo $row['LicenseNo'];}else if(isset($_GET['s_id'])){ echo $row1['LicenseNo'];}?>"/></td>
      <td align="center"><strong>Weapon Number</strong></td>
      <td><input type="text" name="weapon" id="weapon" value="<?php if(isset($_GET['nic'])){ echo $row['weapon_no'];}else if(isset($_GET['s_id'])){ echo $row1['weapon_no'];}?>" oninput="getWeapon(this.value)"/></td>
    </tr>
    
    <tr>
      <th height="16" scope="row"><strong>Membership</strong></th>
      <td><select name="membership" id="membership">
      <option selected="selected" value="">--SELECT MEMEBERSHIPS---</option>
      <option value="Silver" <?php if($nic_membership== 'Silver' ){ echo 'selected'; }?>>---SILVER---</option>
      <option value="Gold" <?php if($nic_membership== 'Gold' ) {echo 'selected';} ?>>---GOLD---</option>
      <option value="Platinum" <?php if($nic_membership== 'Platinum' ){ echo 'selected';} ?>>---PLATINIUM---</option>
       <option value="Walkin"<?php if($nic_membership== 'Walkin') {echo 'selected'; }?>>---WALKIN---</option>
     </select></td>
     <td align="center"><strong>Prd Code</strong></td>
      <td><input type="text" name="pcode" id="pcode" oninput="getpcode(this.value)"/></td>
    </tr>
  </table>
  <table width="1128" border="1" align="center" style="color:#000;margin-top:20px;font-size:16px">
    <tr>
      <th width="128" height="35" scope="col">Date</th>
      <th width="181" scope="col">Quantity</th>
      <th width="203" scope="col">Rate</th>
      <th width="248" scope="col">Total</th>
      <th width="349" colspan="2" scope="col">Details</th>
    </tr>
    <tr>
      <td height="36" align="center"><?php echo $date; ?></td>
      <td><input type="text" name="quantity" id="quantity" value="<?php  if(isset($_GET['s_id'])){ echo $row1['Quantity'];}?>" oninput="rate()" required/></td>
      <td><input type="text" name="amount" id="amount" value="<?php  if(isset($_GET['s_id'])){ echo $row1['Amount'];}?>" oninput="rate()" required/></td>
      <td><input type="text" name="total" id="total" value="<?php  if(isset($_GET['s_id'])){ echo $row1['total'];}?>" required/></td>
      <th colspan="2" scope="col"><input type="text" name="details" id="details" value="<?php  if(isset($_GET['s_id'])){ echo $row1['Details'];}?>"/></th>
    </tr>
  </table>
  
  <?php
  		$query=mysql_query("SELECT `Sid` FROM `sales` ORDER BY `Sid` DESC LIMIT 1") or die();
		$row=mysql_fetch_array($query);
		
  ?>
  <div align="center" style="margin-top:50px;"><?php if(isset($_GET['s_id'])==""){?><input type="submit" name="submit" class="btn btn-large btn-primary" value="Save"><?php }?>
  <?php if(isset($_GET['s_id'])!=""){?><input type="submit" name="update" class="btn btn-large btn-primary" value="Update"><?php }?>
  <!----<span style="margin-left:20px;"><a href="store.php?page=addmoreproduct&sid=<?php //echo $row[0];?>"><input type="button" class="btn btn-large btn-primary" value="ADD MORE SALE"></a></span>---><!---<span style="margin-left:20px;"><a href="store.php?page=salesbill2&sid=<?php // echo  $row[0];?>"><input type="button" class="btn btn-large btn-primary" value="Generate Bill" style="background-color:#666"></a></span>--></div>
</form>
