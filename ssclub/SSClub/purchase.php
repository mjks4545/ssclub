<?php 

      // get varible from gotopurchase page
	  	$s_name="";
		$r_Name="";
		if(isset($_GET['name']))
		{
			$s_name=$_GET['name'];
			$qry=mysql_query("select * from `purchase` where `name`='$s_name' AND `plan`='Dealer' ORDER BY `p_id` DESC") or die();
			$row=mysql_fetch_array($qry);
			$r_Name=$row['name'];
			$plan=$row['plan'];
			$product=$row['product'];
				
		} 
		// get id of last record when product is first submit 
		 if(isset($_GET['id']))
	   {
			$id=$_GET['id'];
			$qry1=mysql_query("select * from `purchase` where `p_id`='$id'") or die();
			$row1=mysql_fetch_array($qry1);
			$old_product=$row1['product'];
			$old_type=$row1['prd_type'];
			$old_model=$row1['pmodel'];
			
			
	   }
	   
	
	   if(isset($_POST['submit']))
	   {
	    	 $product=$_POST['product'];
			 $prd_type=$_POST['subproduct'];
			 $pmodel=$_POST['pmodel'];
			 $weapon_no=$_POST['weapon_no'];
			 $plan=$_POST['plan'];
			 $quantity=$_POST['quantity'];
			 $name=ltrim($_POST['name']);
	    	 $cnic=ltrim($_POST['cnic']);
			 $phone=ltrim($_POST['phone']);
	    	 $address=$_POST['address'];
       		 $license_no=ltrim($_POST['license_no']);
	   		 $price=ltrim($_POST['price']);
			 $date=date("Y-m-d");
			 $sales_price=ltrim($_POST['sales_price']);
			 
			 if($product=="")
			 {
				$product=$old_product; 
			 }
			if($prd_type=="")
	   		 {
			  $prd_type=$old_type;	 
			 }
			 if($pmodel=="")
			 {
				$pmodel=$old_model;	 
			 }
			if($name!="")
			{
			 mysql_query("INSERT INTO `purchase` VALUES ('','$product','$prd_type','$pmodel','$weapon_no','$plan','$quantity','$name','$cnic','$phone','$address','$license_no','$price','$sales_price','$date')");
			 $id=mysql_insert_id();
			header("Location:store.php?page=purchase&name=$name&id=$id&msg=Record Submit Successfully");	
			}
	  	
	   }
	 
?>
<div style="color:#06F;margin-top:40px;margin-top:0px;" align="center"><strong><?php if(isset($_GET['msg'])) { echo $_GET['msg'];}?></strong></div>
<div align="center" style="color:#000;"><strong><h3>Purchase</h3></strong></div>
<div>
<form method="post" action="" name="form">
   <table width="734" height="808" border="1" align="center" style="color:#000;font-size:16px;">
   		<tr align="center">
        <td width="223" height="55"><strong>Product</strong></td>
        <td width="495">
         <?php if(isset($_GET['id'])){ echo $product;}else{?>
       <select name="product" id="product" onclick="getPurchase(this.value)" required>
       <option selected="selected"  value="">--Select Option--</option>
       <option value="Acessories" <?php if(isset($_GET['id']) && $product=='Acessories'){ echo 'selected="selected"';}?>>--Acessories--</option>
       <option value="Fire Arms"  <?php if(isset($_GET['id']) && $product=='Fire Arms'){ echo 'selected="selected"';}?>>--Fire Arms--</option>
       <option value="Ammunition" <?php if(isset($_GET['id']) && $product=='Ammunition'){ echo 'selected="selected"';}?>>--Ammunition--</option>
       <option value="Air Rifle" <?php if(isset($_GET['id']) && $product=='Air Rifle'){ echo 'selected="selected"';}?>>--Air Rifle--</option>
       </select>
       <?php }?>
        </tr>
        <tr align="center">
        <td height="54"><strong>Product TYPE & MODEL</strong></td>
        <td><div id="subcat"><?php if(isset($_GET['id'])){ echo $row1['prd_type']."&nbsp;&nbsp;&nbsp;/"; }?> &nbsp;&nbsp; <?php if(isset($_GET['id'])){ echo $row1['pmodel'];}?></div></td>
        </tr >
        <tr align="center">
        <td height="65"><strong>Weapon Number</strong></td>
        <td><input "text" name="weapon_no" id="weapon_no" value="<?php if(isset($_GET['id'])){ echo $row1['weapone_no'];}?>" required/></td>
        </tr>
        <tr align="center">
        <td height="52"><strong>Purchase From</strong></td>
        <td><select name="plan" onchange="getValue()" id="purchasefrom">
        	<option value="" selected="selected">--SELECT OPTION--</option>
        	<option value="Dealer" <?php if(isset($_GET['name']) && $plan=='Dealer'){ echo 'selected';}?>>Dealer</option>
          <option valus="individual" <?php if(isset($_GET['name']) && $plan=='individual'){ echo 'selected';}?>><strong>Individual</option>
        </select></td>
        </tr>
        <tr align="center">
          <td height="53"><strong>Quantity</strong></td>
          <td><input type="text" name="quantity" id="quantity" value="<?php if(isset($_GET['id'])){ echo $row1['Quantity'];}?>" required/></td>
        </tr>
        <tr align="center">
        <td height="62"><strong>Name</strong></td>
        <td><input "text" name="name" value="<?php if($s_name==$r_Name){ echo $r_Name;}else if(isset($_GET['name'])){ echo $_GET['name'];}?>" required/></td>
        </tr>
        <tr align="center">
        <td height="62"><strong>CNIC</strong></td>
        <td><input "text" name="cnic" id="cnic" value="<?php if(isset($_GET['name'])){ echo $row['cnic'];}?>" required/></td>
        </tr>
        <tr align="center">
        <td height="62"><strong>Phone NO</strong></td>
        <td><input "text" name="phone" id="phone" value="<?php if(isset($_GET['name'])){ echo $row['phone'];}?>"/></td>
        </tr>
        <tr  align="center">
        <td height="55"><strong>Address</strong></td>
        <td><input "text" name="address" value="<?php if(isset($_GET['name'])){ echo $row['address'];}?>"/></td>
        </tr>
        <tr align="center">
        <td height="54"><strong>License No</strong></td>
        <td><input "text" name="license_no" id="license_no" value="<?php if(isset($_GET['name'])){ echo $row['license_no'];}?>"/>
        </tr>
        <tr align="center">
        <td height="36"><strong>Purchase Price</strong></td>
        <td><input "text" name="price" value="<?php if(isset($_GET['id'])){ echo $row1['price'];}?>" required/></td>
      </tr>
        <tr align="center">
          <td height="37"><strong>Sales Price</strong></td>
          <td><input type="text" name="sales_price" id="sales_price" value="<?php if(isset($_GET['id'])){ echo $row1['sales_price'];}?>" style="border:1px solid #999" required/></td>
        </tr>
        <tr align="center">
        <td height="54" colspan="2">
        <input type="submit" name="submit" class="btn btn-large btn-primary" value="Save" id="submit">
        </td>
        </tr>
   </table>
</form>
</div>

