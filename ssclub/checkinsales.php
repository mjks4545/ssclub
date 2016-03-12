<?php		
                        error_reporting(0);
                        //$ssregid = $_GET['reg_id'];
                        //echo $ssregid;
                       // $newqry = mysql_query("select * from persondetails where Reg_NO =$ssregid") or die();
                       // $newqry1 = mysql_query("select * from persondetails2 where Reg_NO =$ssregid") or die();
                        //print_r($newqry1);
                      ////  $newarr = mysql_fetch_array($newqry);
                      //  print_r($newarr);
                       
                        
                      //  print_r($newarr);
				
				// get varibale from gottosales 
				if(isset($_GET['reg_id']))
				{
					$reg_id=$_GET['reg_id'];
					$qry=mysql_query("select * from `checkin` where `Reg_NO`='$reg_id'") or die();
					$row=mysql_fetch_array($qry);
					$membership=$row['Membership'];
					
                                        //print_r($row);
                                        $ssname = $row['NIC'];
                                        $qry1234=mysql_query("select `Sid`,`Date` from `sales` where `NIC`='$ssname'") or die();
                                        //while($qry1234){$row11111=mysql_fetch_array($qry1234);}
                                        while ($fetcharray = mysql_fetch_array($qry1234)) {
                                                $date2 = $fetcharray['Date'];
                                                $sales_id = $fetcharray['Sid']; 
                                        }
                                           $row11111=mysql_fetch_array($qry1234);
                                        //print_r($row11111);
                                           //echo time();
                                   $date1 = date("Y-m-d");
                                   //$date2= $row11111['Date'];
                                   if($date1 == $date2){
                                       //$date=date('Y-m-d');
                                       $sql=mysql_query("SELECT sales.Sid,salesbill.sb_id FROM checkin JOIN sales ON checkin.NIC=sales.NIC JOIN salesbill ON sales.Sid=salesbill.s_id where `TimeOut`='' AND `Reg_NO`='$reg_id' AND `Date`='$date1' ORDER BY sales.Sid DESC") or die();
                                       $run_qry=mysql_fetch_array($sql);
                                       $bill_id=$run_qry[1];
                                       //$b_sid=$run_qry[0];
                                       //$sales_id = $row11111['Sid'];
                                       if($bill_id == 0 || $bill_id == ''){
                                            header("Location:store.php?page=addmoreproduct&sid=$sales_id");
                                       }
                                   }    
                                        
				
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
						$sales_id = mysql_insert_id();
                                                header("Location:store.php?page=addmoreproduct&sid=$sales_id&msg=Record Insert Successfully");
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
      <td><select name="product" id="product" onchange="getSub(this.value)" >
     	<option selected="selected"  value="">--Select Option--</option>
      	 <option value="Acessories">--Acessories--</option>
      	 <option value="Ammunition">--Ammunition--</option>
         <option value="Pistol">--Pistol--</option>
         <option value="Rifle">--Rifle--</option>
         <option value="Shortgun">--Shortgun--</option>
         <option value="Air Rifle">--Air Rifle--</option>
   		 </select></td>
      <td align="center"><strong>Product Type</strong></td>
      <td nowrap="nowrap"><div id="subcat" ></div><div id="subofsubcat"></div></td>
    </tr>
    <tr>
      <th height="16" scope="row"><strong>License No</strong></th>
      <td><input type="text" name="LicenseNo" id="LicenseNo" value="<?php if(isset($_GET['reg_id'])){ echo $row['LicenseNO'];}?>"/></td>
      <td align="center"><strong>Weapon Number</strong></td>
      <td><input type="text" name="weapon" id="weapon" value="" 
      oninput="getWeapon(this.value)"/></td>
    </tr>
    
    <tr>
      <th height="29" scope="row"><strong>Membership</strong></th>
      <td align="center" style="margin-bottom:10px;font-size:20px;"><?php if(isset($_GET['reg_id'])){ echo $row['Membership'];}?></td>
      <td align="center"><strong>Prd Code</strong></td>
      <td id="something"><input type="text" name="pcode" id="pcode" oninput=""></td>
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
      <td id="something123"><input type="text" name="amount" id="amount" value="" oninput="rate()" required/></td>
      <td><input type="text" name="total" id="total" value=""/></td>
      <th colspan="2" scope="col"><input type="text" name="details" id="details" /></th>
    </tr>
  </table>
  <?php
  		$query=mysql_query("SELECT `Sid` FROM `sales` ORDER BY `Sid` DESC LIMIT 1") or die();
		$row=mysql_fetch_array($query);
		
  ?>
  <div align="center" style="margin-top:50px;"><?php if(isset($_GET['s_id'])==""){?><input type="submit" name="submit" class="btn btn-large btn-primary" value="Save"><?php }?><span style="margin-left:20px;"><a href="store.php?page=addmoreproduct&sid=<?php echo $row[0];?>"></a></span><span style="margin-left:20px;"><a href="store.php?page=salesbill2&sid=<?php echo $row[0];?>"><input type="button" class="btn btn-large btn-primary" value="Generate Bill" style="background-color:#666"></a></span></div>
</form>
<div style="margin-top:20px;">
    
</div>
  <div align="center"></div>
  