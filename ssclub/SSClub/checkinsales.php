<?php			
				error_reporting(0);
				// get varibale from gottosales 
				if(isset($_GET['reg_id']))
				{
					$reg_id=$_GET['reg_id'];
					$qry=mysql_query("select * from `checkin` where `Reg_NO`='$reg_id'") or die();
					$row=mysql_fetch_array($qry);
					$membership=$row['Membership'];
					
				
                
				
				$s_id="";
				$date=date("Y-m-d");;
			// insertion into sales
				if(isset($_POST['submit']))
				{
					$cname=$_POST['cname'];
					$nic=$_POST['nic'];
					$mobile=$_POST['mobile'];
					$address=$_POST['address'];
					$amount=$_POST['amount'];
					$Product=$_POST['product'];
					$subproduct=$_POST['subproduct'];
					$pmodel=$_POST['pmodel'];
					
					$LicenseNo=$_POST['LicenseNo'];
					$quantity=$_POST['quantity'];
					$balance=$_POST['total'];
					$details=$_POST['details'];
					$weapon=$_POST['weapon'];
					$date=date("Y-m-d");
					
					
					
					if($cname!="")
					{
						
						mysql_query("insert into `sales` values ('','$cname','$nic','$mobile','$address','$Product','$subproduct','$pmodel','$LicenseNo','$weapon','$membership','$quantity','$amount','$balance','$details','$date')") or die(mysql_error());
						header("Location:store.php?page=checkinsales&msg=Record Insert Successfully");
					}
					
					}
				} // end of get varibale
				 
?>
<div style="color:#06F;margin-top:0px;" align="center"><strong><?php if(isset($_GET['msg'])) { echo $_GET['msg'];}?></strong></div>
<div align="center" style="color:#000;"></span><strong><h3>Sales</h3></strong></div>
<form name="form1" method="post" action="">

  <table width="1163" border="1" align="center" style="color:#000;font-size:16px">
    <tr>
      <th width="191" height="34" scope="row"> Name</th>
      <td width="355"><input type="text" name="cname" id="cname" value="<?php if(isset($_GET['reg_id'])){ echo $row['Name'];}?>" autofocus required/></td>
      <td width="173" align="center"><strong>CNIC</strong></td>
      <td width="416"><input type="text" name="nic" id="nic" value="<?php if(isset($_GET['reg_id'])){ echo $row['NIC'];}?>" required/></td>
    </tr>
    <tr>
      <th height="35" scope="row" ><strong>Moble NO</strong></th>
      <td><input type="text" name="mobile" id="mobile" value="<?php if(isset($_GET['reg_id']))echo $row['TelephoneNo'];?>" required/></td>
      <td align="center"><strong>Address</strong></td>
      <td><input type="text" name="address" id="address" value="<?php if(isset($_GET['reg_id'])){ echo $row['Address'];}?>" required/></td>
    </tr>
    <tr>
      <th height="16" scope="row">Product</th>
      <td><select name="product" id="product" onchange="getSub(this.value)" required>
     	<option selected="selected"  value="">--Select Option--</option>
      	<option value="Acessories">--Acessories--</option>
      	<option value="Fire Arms">--Fire Arms--</option>
      	<option value="Ammunition">--Ammunition--</option>
         <option value="Air Rifle">--Air Rifle--</option>
   		 </select></td>
      <td align="center"><strong>Product Type</strong></td>
      <td nowrap="nowrap"><div id="subcat" ></div></td>
    </tr>
    <tr>
      <th height="16" scope="row"><strong>License No</strong></th>
      <td><input type="text" name="LicenseNo" id="LicenseNo" value="<?php if(isset($_GET['reg_id'])){ echo $row['LicenseNO'];}?>"/></td>
      <td align="center"><strong>Weapon Number</strong></td>
      <td><input type="text" name="weapon" id="weapon" value="<?php if(isset($_GET['reg_id'])){ echo $row['WeaponName'];}?>" 
      oninput="getWeapon(this.value)"/></td>
    </tr>
    
    <tr>
      <th height="29" scope="row"><strong>Membership</strong></th>
      <td align="center" style="margin-bottom:10px;font-size:20px;"><?php if(isset($_GET['reg_id'])){ echo $row['Membership'];}?></td>
      <td align="center"></td>
      <td></td>
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
      <td><input type="text" name="quantity" id="quantity" value="" oninput="rate()" required/></td>
      <td><input type="text" name="amount" id="amount" value="" oninput="rate()" required/></td>
      <td><input type="text" name="total" id="total" value=""/></td>
      <th colspan="2" scope="col"><input type="text" name="details" id="details" required/></th>
    </tr>
  </table>
  <?php
  		$query=mysql_query("SELECT `Sid` FROM `sales` ORDER BY `Sid` DESC LIMIT 1") or die();
		$row=mysql_fetch_array($query);
		
  ?>
  <div align="center" style="margin-top:50px;"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Save"><span style="margin-left:20px;"><a href="store.php?page=addmoreproduct&sid=<?php echo $row[0];?>"><input type="button" class="btn btn-large btn-primary" value="ADD MORE SALE"></a></span><span style="margin-left:20px;"><a href="store.php?page=salesbill2&sid=<?php echo $row[0];?>"><input type="button" class="btn btn-large btn-primary" value="Generate Bill" style="background-color:#666"></a></span></div>
</form>
<div style="margin-top:20px;">
    
</div>
  <div align="center"></div>
  