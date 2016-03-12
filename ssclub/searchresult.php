<?php
			// Simple Search Query 
			
		
			if(isset($_GET['search']))
			 {
				$search=$_GET['search'];
				$query=mysql_query("select * from `checkin` where `Reg_NO` LIKE '%$search%' OR `Name` LIKE '%$search%' OR `NIC` LIKE '%$search%' OR  `TelephoneNo` LIKE '%$search%' OR `CardNo` LIKE '%$search%' ORDER BY `Reg_NO`  DESC ") or die('could not found result');
				$count=mysql_num_rows($query);
				 $row=mysql_fetch_array($query);
				 $waepon=$row['Weapon'];
				 $registerno=$row['Reg_NO'];
				 $nic=$row['NIC'];
				
				$record=mysql_query("select * from `totalcharges` where `Reg_NO`='$registerno'") or die();
				$fetch=mysql_fetch_array($record);
				}
			
			

?>

<div align="center" style="color:#000;margin:20px;"><strong>Result Found For: &nbsp;&nbsp;&nbsp;</strong><?php if(isset($search)) { echo $search;}?><?php if($count=='0'){ echo '<div style="color:#F00;"><strong>NO RESULT FOUND.</strong></div>';}?></div>
<table width="652" height="346" border="1" align="center" style="color:#000;border:#666">
  <tr align="center">
    <td width="127" height="38"><strong>Name:</strong> </td>
    <td width="167"><?php if(isset($search)) {echo $row['Name'];}?></td>
    <td height="38" nowrap="nowrap"><strong>License NO</strong></td>
    <td height="38"><?php  if(isset($search)){ echo $row['LicenseNO'];}?></td>
  </tr>
  <tr align="center">
    <td height="50"><strong>Profession:</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
    <td height="50"><?php  if(isset($search)){ echo $row['Profession'];}?></td>
    <td width="106" nowrap="nowrap"><strong>ID Card:</strong></td>
    <td width="224"><?php if(isset($search)){echo $row['NIC'];;}?></td>
  </tr>
  <tr align="center">
    <td height="51" nowrap="nowrap"><strong>Telephone No:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td height="51" nowrap="nowrap"><?php if(isset($search)){ echo $row['TelephoneNo'];}?></td>
    <td height="51" nowrap="nowrap"><strong>Address :</strong></td>
    <td height="51" nowrap="nowrap"><?php if(isset($search)){ echo $row['Address'];}?></td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap"><strong>Weapon: </strong>&nbsp;&nbsp;&nbsp;
      </td>
    <td nowrap="nowrap" ><?php echo $waepon;?></td>
    
    <td><strong>Weapon Name</strong></td>
    <td><?php if(isset($search)){ echo $row['WeaponName'];}?></td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap"><strong>Arrival Time:
     
    </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td nowrap="nowrap" ><?php  if(isset($search)){ echo $row['ArrivalTime'];}?></td>
    <td><strong>Time Out</strong></td>
    <td><?php if(isset($search)){ echo $row['TimeOut'];}?></td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap"><strong>Card No</strong>&nbsp; &nbsp;&nbsp;&nbsp;</td>
    <td nowrap="nowrap"><?php echo $row['CardNo'];?></td>
    <td nowrap="nowrap"><strong>Booth NO</strong></td>
    <td nowrap="nowrap"><?php if(isset($search)){ echo $row['BoothNo'];}?></td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap"><strong>Persons</strong></td>
    <td nowrap="nowrap"><?php if(isset($search)){ echo $row['Persons'];}?></td>
    <td nowrap="nowrap"><strong>Charges</strong></td>
    <td nowrap="nowrap"><?php echo $row['RangeCharge'];?></td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap"><strong>Remarks</strong></td>
    <td nowrap="nowrap"><?php echo $row['Remarks'];?></td>
    <td nowrap="nowrap">&nbsp;</td>
    <td nowrap="nowrap">&nbsp;</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap"><strong>Picture:</strong></td>
    <td colspan="3" nowrap="nowrap"><?php
		 $query1=mysql_query("select `Picture` from `checkin` where `NIC`='$nic' ORDER BY `Reg_NO` ASC") or die();
		 $picture=mysql_fetch_array($query1);
		 $pic=$picture['0'];		
	?><?php if(isset($search)){?>
      <img src="picture/<?php echo $pic?>" width="100" height="100">
    <?php }?> </td>
  </tr>
  </table>
  <div style="color:#000">
  <?php 
  			if($row['Persons']!=1)
			{
  
  ?>
 	<table width="647" border="1" align="center">
 	  <tr>
 	    <th width="77" scope="col">P1.Name</th>
 	    <th width="81" scope="col">P1.Cell</th>
 	    <th width="87" scope="col">P1.Address</th>
 	    <th width="100" scope="col">P2.Name</th>
 	    <th width="114" scope="col">P2.Cell</th>
 	    <th width="148" scope="col">P3.Address</th>
      </tr>
      <?php 
	  		$moredetails=mysql_query("select * from `persondetails` where `Reg_NO`='$registerno'") or die(mysql_error());
			$row1=mysql_fetch_array($moredetails);
			$morepersons=mysql_query("select * from `persondetails2` where `Reg_No`='$registerno'") or die(mysql_error());
			$row2=mysql_fetch_array($morepersons);
			$count=mysql_num_rows($morepersons);
			
	  ?>
 	  <tr align="center">
 	    <td><?php echo $row1['pname'];?></td>
 	    <td><?php echo $row1['pcell'];?></td>
 	    <td><?php echo $row1['paddress'];?></td>
 	    <td><?php echo $row2['pname2'];?></td>
 	    <td><?php echo $row2['pcell2'];?></td>
 	    <td><?php echo $row2['paddress2'];?></td>
      </tr>
    </table>
    <?php }?>
 </div>
