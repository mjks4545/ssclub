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
				/*---------------------------------------------------------------------------------------*/	
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
						if(strchr($weapon,'to')){
                                                    $quantity = 1;
                                                    list($first,$second)=explode('to', $weapon);
                                                    $first = str_replace(' ', '', $first);
                                                    $second = str_replace(' ', '', $second);
                                                    //echo $first;
                                                if(ctype_digit ( $first )){
                                                    
                                                    echo '5';
                                                    $third =  $second - $first;
                                                    mysql_query("insert into `sales` values ('','$cname','$nic','$mobile','$address','$Product','$subproduct','$pmodel','$LicenseNo','$first','$membership','$quantity','$amount','$amount','$details','$date')") or die(mysql_error());
                                                    ltrim($first);
                                                    $first = $first+1;
                                                    $sid=mysql_insert_id();
                                                    for($i=1;$i<=$third;$i++){
                                                            
                                                            mysql_query("insert into `sale_bill2` values('','$Product','$subproduct','$pmodel','$first','$quantity','$amount','$amount','$details','$sid')") or die(mysql_error());
                                                            $first = $first+1;
                                                        }
                                                    
                                                }else{
                                                    echo '1';
                                                    
                                                    
                                                    $secondvar= $second;
                                                    $firstvar = $first;
                                                    if(!is_int ( $first )){
                                                        echo '2';
                                                        preg_match_all('/([0-9]+|[a-zA-Z]+)/',$first,$matches);
                                                        $firstvar = end(end($matches));
                                                        
                                                    }
                                                    if(!is_int ($second)){
                                                        echo '3';
                                                        preg_match_all('/([0-9]+|[a-zA-Z]+)/',$second,$matches1);                                                
                                                        $secondvar =  end(end($matches1));  
                                                        
                                                    }
                                                    echo '4';
                                                    $third =  $secondvar - $firstvar;
                                                    //echo $third;
                                                    //die();
                                                    $current = current(current($matches));
                                                       
                                                        mysql_query("insert into `sales` values ('','$cname','$nic','$mobile','$address','$Product','$subproduct','$pmodel','$LicenseNo','$first','$membership','$quantity','$amount','$amount','$details','$date')") or die(mysql_error());
                                                       
                                                        $firstvar = $firstvar + 1;
                                                        $sid=mysql_insert_id();
                                                       
                                                        for($i=1;$i<=$third;$i++){
                                                            $first = $current.$firstvar;
                                                            mysql_query("insert into `sale_bill2` values('','$Product','$subproduct','$pmodel','$first','$quantity','$amount','$amount','$details','$sid')") or die(mysql_error());
                                                            $firstvar = $firstvar + 1;
                                                        }
                                                    
                                                } 
                                                    
                                                //die();
                                                    
                                                    $sales_id=$sid;
                                                    header("Location:store.php?page=addmoreproduct&sid=$sales_id&msg=Records Insert Successfully");
                                               }elseif(strchr($weapon,',')){
                                                    list($first,$second)=explode(',', $weapon);
                                    
                                                    for($i = 1;$i<=2;$i++){
                                        
                                                    if($i == 1){
                                                        $third = $first;
                                                    }elseif($i == 2){
                                                        $third = $second;
                                                    }
                                        
                                        mysql_query("insert into `sales` values ('','$cname','$nic','$mobile','$address','$Product','$subproduct','$pmodel','$LicenseNo','$third','$membership','$quantity','$amount','$amount','$details','$date')") or die(mysql_error());
                                                         }
                                                }else{
                                                	mysql_query("insert into `sales` values ('','$cname','$nic','$mobile','$address','$Product','$subproduct','$pmodel','$LicenseNo','$weapon','$membership','$quantity','$amount','$balance','$details','$date')") or die(mysql_error());
                                                        $sales_id=mysql_insert_id();
                                                        header("Location:store.php?page=addmoreproduct&sid=$sales_id&msg=Record Insert Successfully");
                                                }
                                                
                                        }
                                        
                  
					}
				/*----------------------------------------------------------------------------*/
				
				 
?>
<div style="color:#06F;margin-top:0px;" align="center"><strong><?php if(isset($_GET['msg'])) { echo $_GET['msg'];}?></strong></div>
<div align="center" style="color:#000;"><span style="margin-right:700px;"><a href="store.php?page=settax"><input type="button" name="submit" class="btn btn-large btn-primary" value="Set Tax"></a></span></div>
<div class="main">
    <h1 style="width: 170px;">Sales</h1>
</div>
<form name="form1" method="post" action="">

    <table class="responstable">
    <tr>
        <td style="width: 123px;">Name :</td>
      <td><input type="text" name="cname" id="cname" value="<?php if(isset($_GET['nic'])){ echo $row['Cname'];}else if(isset($_GET['s_id'])){ echo $row1['Cname'];}?>" autofocus required/></td>
      <td style="width: 112px;">CNIC :</td>
      <td><input type="text" name="nic" id="nic" value="<?php if(isset($_GET['nic'])){ echo $_GET['nic'];} else if(isset($_GET['s_id'])){ echo $row1['NIC'];}?>" required/></td>
    </tr>
    <tr>
      <td>Moble NO :</td>
      <td><input type="text" name="mobile" id="mobile" value="<?php if(isset($_GET['nic'])){echo $row['MobileNo'];}else if(isset($_GET['s_id'])){ echo $row1['MobileNo'];}?>" required/></td>
      <td align="center"><strong>Address</strong></td>
      <td><input type="text" name="address" id="address" value="<?php if(isset($_GET['nic'])){ echo $row['Address'];}else if(isset($_GET['s_id'])){ echo $row1['Address'];}?>" required/></td>
    </tr>
    <tr>
      <td>Product</td>
      <td id="something1">
      	<select name="product" id="product" onchange="getSub(this.value)">
     	<option selected="selected"  value="">--Select Option--</option>
        <?php $checked = $row1['Product']; ?>
      	<option <?php if($checked == 'Acessories') {echo 'selected=selected';} ?> value="Acessories">--Acessories--</option>
      	<option <?php if($checked == 'Ammunition') {echo 'selected=selected';} ?> value="Ammunition">--Ammunition--</option>
        <option <?php if($checked == 'Pistol') {echo 'selected=selected';} ?> value="Pistol">--Pistol--</option>
        <option <?php if($checked == 'Rifle') {echo 'selected=selected';} ?> value="Rifle">--Rifle--</option>
        <option <?php if($checked == 'Shortgun') {echo 'selected=selected';} ?> value="Shortgun">--Shortgun--</option>
        <option <?php if($checked == 'Air Rifle') {echo 'selected=selected';} ?> value="Air Rifle">--Air Rifle--</option>   		  
       </select>
         
         </td>
      <td align="center"><strong>Product Type</strong></td>
      <td nowrap="nowrap"><span><?php if(isset($_GET['s_id'])){echo $row1['SubProduct'].'&nbsp;&nbsp;/&nbsp;&nbsp;'; echo $row1['pmodel'].'&nbsp;';}?></span><div><div id="subcat"></div><div id="subofsubcat"></div></div></td>
    </tr>
    <tr>
      <td>License No</td>
      <td><input type="text" name="LicenseNo" id="LicenseNo" value="<?php if(isset($_GET['nic'])){ echo $row['LicenseNo'];}else if(isset($_GET['s_id'])){ echo $row1['LicenseNo'];}?>" required /></td>
      <td align="center"><strong>Weapon Number</strong></td>
      <td><input type="text" name="weapon" id="weapon" value="<?php if(isset($_GET['nic'])){ echo $row['weapon_no'];}else if(isset($_GET['s_id'])){ echo $row1['weapon_no'];}?>" oninput="getWeapon(this.value)"/></td>
    </tr>
    
    <tr>
      <td>Membership</td>
      <td><select name="membership" id="membership" required>
      <option selected="selected" value="">--SELECT MEMEBERSHIPS---</option>
      <option value="Silver" <?php if($nic_membership== 'Silver' ){ echo 'selected'; }?>>---SILVER---</option>
      <option value="Gold" <?php if($nic_membership== 'Gold' ) {echo 'selected';} ?>>---GOLD---</option>
      <option value="Platinum" <?php if($nic_membership== 'Platinum' ){ echo 'selected';} ?>>---PLATINIUM---</option>
       <option value="Walkin"<?php if($nic_membership== 'Walkin') {echo 'selected'; }?>>---WALKIN---</option>
     </select></td>
     <td align="center"><strong>Prd Code</strong></td>
     <td id="something"><input type="text" name="pcode" id="pcode" oninput=""></td>
    </tr>
  </table>
    <table class="responstable" style="margin-top: 0px;">
    <tr>
      <th>Date</th>
      <th>Quantity</th>
      <th>Rate</th>
      <th>Total</th>
      <th>Details</th>
    </tr>
    <tr>
      <td><?php echo $date; ?></td>
      <td><input type="text" name="quantity" id="quantity" value="<?php  if(isset($_GET['s_id'])){ echo $row1['Quantity'];}?>" oninput="rate()" required/></td>
      <td id="something123"><input type="text" name="amount" id="amount" value="<?php  if(isset($_GET['s_id'])){ echo $row1['Amount'];}?>" oninput="rate()" required/></td>
      <td><input type="text" name="total" id="total" value="<?php  if(isset($_GET['s_id'])){ echo $row1['total'];}?>" required/></td>
      <td><input type="text" name="details" id="details" value="<?php  if(isset($_GET['s_id'])){ echo $row1['Details'];}?>" /></td>
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

<script>
        
        if( $('#product').val() == 'Fire Arms' ){
        
            $("#weapon").prop('disabled', true);
        
        }else{
           $("#weapon").prop('disabled', false);
        }
       $('#weapon').on('input',function(){
               
            $('#quantity').val('');
            $.ajax({
                type: "POST",
                url: 'quantity.php',
                data: $(this).serialize(),
                success: function(data1){
                //console.log(data1);
           
                $('#quantity').val(data1);
       },
        //dataType: 'json'
       });
            
            
        })
</script>

