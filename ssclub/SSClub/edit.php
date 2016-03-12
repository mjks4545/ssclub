<?php
								
				if(isset($_GET['id']))
				{
					$id=$_GET['id'];
					
					$query=mysql_query("select * from `checkin` where `Reg_NO`='$id'") or die(mysql_error());
					$row=mysql_fetch_array($query);	
					$name=$row['Name'];
					$date=$row['ArrivalDate'];
					$nic=$row['NIC'];
				}
				
				if(isset($_POST['submit']))
				{
					
					$id=$_POST['id'];
					header("Location:index.php?page=showbill&id=$id");
					
				}

?>
<div align="center" style="color:#000;margin:20px;"><strong>Result For: &nbsp;&nbsp;&nbsp;</strong> <strong><?php if(isset($id)) { echo $row['Name'];}?></strong></div>
<table width="100%" height="510" border="1" align="center"  style="color:#000;font-size:16px;">
  <tr align="center">
    <td width="206"  height="36"><strong>Name:</strong> </td>
    <td width="257"><strong><?php if(isset($id)) {echo $row['Name'];}?></strong></td>
    <td height="36" nowrap="nowrap"><strong>License NO</strong></td>
    <td height="36"><?php  if(isset($id)){ echo $row['LicenseNO'];}?></td>
  </tr>
  <tr align="center">
    <td height="33"><strong>Father Name</strong></td>
    <td height="33"><?php if(isset($id)){ echo $row['fname'];}?></td>
    <td width="219" nowrap="nowrap"><strong>ID Card:</strong></td>
    <td width="272"><?php if(isset($id)){echo $row['NIC'];;}?></td>
  </tr>
  <tr align="center">
    <td height="34" nowrap="nowrap"><strong>Telephone No:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td height="34" nowrap="nowrap"><?php if(isset($id)){ echo $row['TelephoneNo'];}?></td>
    <td height="34" nowrap="nowrap"><strong>Address :</strong></td>
    <td height="34"><?php if(isset($id)){ echo $row['Address'];}?></td>
  </tr>
  <tr align="center">
    <td height="34" nowrap="nowrap"><strong>Weapon: </strong>&nbsp;&nbsp;&nbsp;
      </td>
    <td nowrap="nowrap"><?php echo $row['Weapon'];?></td>
    
    <td><strong>Weapon Name/NO</strong></td>
    <td><?php if(isset($id)){ echo $row['WeaponName'];}?></td>
  </tr>
  <tr align="center">
    <td height="35" nowrap="nowrap"><strong>Arrival Time:
     
    </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td nowrap="nowrap" ><?php  if(isset($id)){ echo $row['ArrivalTime'];}?></td>
    <td><strong>Time Out</strong></td>
    <td><?php if(isset($id)){ echo $row['TimeOut'];}?></td>
  </tr>
  <tr align="center">
    <td height="40" nowrap="nowrap"><strong>Card No</strong>&nbsp; &nbsp;&nbsp;&nbsp;</td>
    <td nowrap="nowrap"><?php echo $row['CardNo'];?></td>
    <td nowrap="nowrap"><strong>Booth NO</strong></td>
    <td nowrap="nowrap"><?php if(isset($id)){ echo $row['BoothNo'];}?></td>
  </tr>
  <tr align="center">
    <td height="34" nowrap="nowrap"><strong>Persons</strong></td>
    <td nowrap="nowrap"><?php if(isset($id)){ echo $row['Persons'];}?></td>
    <td nowrap="nowrap"><strong>Charges</strong></td>
    <td nowrap="nowrap"><?php echo $row['RangeCharge'];?></td>
  </tr>
  <tr align="center">
    <td height="33" nowrap="nowrap"><strong>Remarks</strong></td>
    <td nowrap="nowrap"><?php echo $row['Remarks'];?></td>
    <td nowrap="nowrap"><strong>Membership</strong></td>
    <td nowrap="nowrap"><?php echo $row['Membership'];?></td>
  </tr>
  <tr align="center">
    <td height="30" nowrap="nowrap"><strong>No of Fire</strong></td>
    <td nowrap="nowrap"><?php echo $row['Fire'];?></td>
    <td nowrap="nowrap"><strong>Date</strong></td>
    <td nowrap="nowrap"><?php echo $row['ArrivalDate'];?></td>
  </tr>
  <tr align="center">
    <td height="31" nowrap="nowrap"><strong>Bill #:</strong></td>
    <td nowrap="nowrap"><?php
    			// get bill number
				
				$qry=mysql_query("select * from `sales` where `NIC`='$nic' AND `Date`='$date'") or die();
				$row1=mysql_fetch_array($qry);
				$sid=$row1['Sid'];
				// selectt bill_number
				$qry1=mysql_query("select * from `salesbill` where `s_id`='$sid'") or die();
				$row2=mysql_fetch_array($qry1);
				$billno=$row2['sb_id'];
				
	
	
	?><?php if($_SESSION['Role']=='administrator')
				{?><a href="store.php?page=salebillreport&id=<?php echo $sid;?>"><?php echo $billno;}else{ ?><?php 
					
					echo $billno;
					}?></a></td>
    <td nowrap="nowrap"><strong>Shooting Experience</strong></td>
    <td nowrap="nowrap"><?php echo $row['s_experience'];?></td>
  </tr>
  <tr align="center">
    <td height="35" nowrap="nowrap"><strong>Profession:</strong> &nbsp; &nbsp;</td>
    <td nowrap="nowrap"><?php  if(isset($id)){ echo $row['Profession'];}?></td>
    <td nowrap="nowrap">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap"><strong>Picture:</strong></td>
    <td colspan="3" nowrap="nowrap"><?php
		 $query1=mysql_query("select `Picture` from `checkin` where `Name`='$name' ORDER BY `Name` ASC") or die();
		 $picture=mysql_fetch_array($query1);
		 $pic=$picture['0'];		
	?><?php if(isset($id)){?>
      <img src="picture/<?php echo $pic?>" width="100" height="100">
    <?php }?> </td>
  </tr>
  </table>
  <div style="color:#000">
  <?php 
  			if($row['Persons']!=1)
			{
			$moredetails=mysql_query("select * from `persondetails` where `Reg_NO`='$id'") or die(mysql_error());
			$row1=mysql_fetch_array($moredetails);
			$morepersons=mysql_query("select * from `persondetails2` where `Reg_No`='$id'") or die(mysql_error());
			$row2=mysql_fetch_array($morepersons);
  ?>
 	<table width="981" border="1" align="center"  style="color:#000;font-size:16px;margin-top:10px;">
 	  <tr>
 	    <th width="169" height="34" scope="col">Name</th>
 	    <th width="292" scope="col">Cell NO</th>
 	    <th width="237" scope="col">NIC #</th>
 	    <th width="255" scope="col">Address</th>
      </tr>
 	  <tr>
 	    <td height="28" align="center"><?php echo $row1['pname'];?></td>
 	    <td align="center"><?php echo $row1['pcell'];?></td>
 	    <td align="center"><?php echo $row1['pnic'];?></td>
 	    <td align="center"><?php echo $row1['paddress'];?></td>
      </tr>
    </table>
 	<table width="985" border="1" align="center" style="color:#000;font-size:16px;margin-top:10px;">
 	  <tr>
 	    <th width="165" height="29" scope="col">Name</th>
 	    <th width="297" scope="col">Cell NO</th>
 	    <th width="241" scope="col">NIC #</th>
 	    <th width="254" scope="col">Address</th>
      </tr>
 	  <tr>
 	    <td height="30" align="center"><?php echo $row2['pname2'];?></td>
 	    <td align="center"><?php echo $row2['pcell2'];?></td>
 	    <td align="center"><?php echo $row2['pnic2'];?></td>
 	    <td align="center"><?php echo $row2['paddress2'];?></td>
      </tr>
    </table>
 <?php }?>
</div>
<form action="" method="post">
<input type="hidden" value="<?php if(isset($_GET['id'])) { echo  $_GET['id'];}?>" name="id">
<!--<div align="center"><input name="submit" type="submit" class="btn btn-large btn-primary" id="submit" value="View Bill"></div>-->
</form>