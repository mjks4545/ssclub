<?php
			if(isset($_GET['id']))
			{
				$mid=$_GET['id'];
				$query=mysql_query("select * from `membership` where `M_id`='$mid'") or die(mysql_error());
				$row=mysql_fetch_array($query);
				$name=$row['Name'];
				
				$query1=mysql_query("select * from `emergency_details` where `M_id`='$mid'") or die(mysql_error());	
				$row1=mysql_fetch_array($query1);
				
				$query2=mysql_query("select * from `nominated_guests` where `M_id`='$mid'") or die(mysql_error());
			}
			

?>
<div align="left" style="margin-left:100px;"></div>
<div align="center" style="color:#000;margin-left:20px"><span><a href="index.php?page=editmember&id=<?php echo $mid;?>"><input type="button" name="button" value="Update Membership Records" class="btn btn-large btn-primary">
</button></a></span><strong style="color:#F00"> &nbsp;Search Result: &nbsp;&nbsp;&nbsp;</strong> <strong style="color:#F00"><?php if(isset($mid)) { echo strtoupper($row['Name']);}?><span style="margin-left:20px;"><a href="index.php?page=paymenthistory&id=<?php if(isset($_GET['id'])){ echo $_GET['id'];}?>">
<input name="button" type="button" class="btn btn-large btn-primary" id="submit" value="View Payment History"></a></span>
<span style="margin-left:0px;"><a href="index.php?page=renewmember&nic=<?php if(isset($_GET['id'])){ echo $row['Cnic'];}?>"><input name="button" type="button" class="btn btn-large btn-primary" id="submit" value="Membership Renewal"></a></span>

</div>
<table width="1049" border="1" align="center" style="color:#000;">
  <tr align="center">
    <th width="134" height="47" scope="row">Name</th>
    <td width="310">&nbsp;<?php if(isset($mid)){ echo $row['Name'];}?></td>
    <td width="166"><strong>Father Name</strong></td>
    <td width="411">&nbsp;<?php  if(isset($mid)){ echo $row['fname'];}?></td>
  </tr>
  <tr align="center">
    <th width="134" height="47" scope="row">CNIC</th>
    <td width="310">&nbsp;<?php if(isset($mid)){ echo $row['Cnic'];}?></td>
    <td width="166"><strong>Datre Of Birth</strong></td>
    <td width="411">&nbsp;<?php  if(isset($mid)){ echo $row['date_birth'];}?></td>
  </tr>
  <tr align="center">
    <th height="56" scope="row">Mobile</th>
    <td><?php if(isset($mid)){ echo $row['Mobile'];}?></td>
    <td><strong>Address</strong></td>
    <td>&nbsp;<?php if(isset($mid)){ echo $row['Address'];}?></td>
  </tr>
  <tr align="center">
    <th height="52" scope="row">Picutre</th>
    <td align="center"><img src="picture/<?php echo $row['Picture'];?>" width="100" height="100"></td>
    <td><strong>MemberShip </strong></td>
    <td><?php if(isset($mid)){ echo $row['Membership'];}?></td>
  </tr>
  <tr align="center">
    <th height="42" scope="row"><strong>Card NO</strong></th>
    <td>&nbsp;<?php if(isset($mid)){ echo $row['CardNo'];}?></td>
    <td><strong>License No</strong></td>
    <td>&nbsp;<?php if(isset($mid)){ echo $row['Licenseno'];}?></td>
  </tr>
  <tr align="center">
    <th height="41" scope="row"><strong>Valide From</strong></th>
    <td><?php if($mid){ echo $row['Validfrom'];}?></td>
    <td><strong>Valid To</strong></td>
    <td>&nbsp;<?php if(isset($mid)){ echo $row['Validto'];}?></td>
  </tr>
  <tr align="center">
    <th height="39" scope="row"><strong>Fee Schedule</strong></th>
    <td><?php if($mid){ echo $row['schedule'];}?></td>
    <td><strong>payments</strong></td>
    <td>&nbsp;<?php if(isset($mid)){ echo $row['payments'];}?></td>
  </tr>
  <tr align="center">
    <th height="38" scope="row">Weapon Name/NO</th>
    <td><?php if(isset($mid)){ echo $row['weapon_name'];}?></td>
    <td><strong>Types of Weapon</strong></td>
    <td><?php if(isset($mid)){ echo $row['t_weapon'];}?></td>
  </tr>
  <tr align="center">
    <th height="39" scope="row">NO of Weapon</th>
    <td><?php if(isset($mid)){ echo $row['no_weapon'];}?></td>
    <td><strong>Any Conviction</strong></td>
    <td><?php if(isset($mid)){ echo $row['criminal'];}?></td>
  </tr>
  <tr align="center">
    <th height="42" scope="row">Education</th>
    <td><?php if(isset($mid)){ echo $row['Education'];}?></td>
    <td><strong>Current Employment</strong></td>
    <td><?php if(isset($mid)){ echo $row['employment'];}?></td>
  </tr>
</table>
 <p style="text-align:center;font-weight:bold;margin-top:10px;color:#F00" > IN CASE OF EMERGENCY CONTACT DETAILS</p>
<table width="1049" border="1" align="center" style="color:#000;font-size:16px">
  <tr style="background:#CCC">
    <th width="152" height="35" scope="col" nowrap="nowrap">Name</th>
    <th width="162" scope="col">CNIC</th>
    <th width="169" scope="col">Mobile</th>
    <th width="231" scope="col">Service/Business</th>
    <th width="290" scope="col">Address</th>
  </tr>
  <tr align="center" >
    <td height="37"><?php if(isset($mid)){ echo $row1['ename'];}?></td>
    <td><?php if(isset($mid)) { echo $row1['ecnic'];}?></td>
    <td><?php if(isset($mid)){ echo $row1['emobile'];}?></td>
    <td><?php if(isset($mid)) { echo $row1['eservices'];}?></td>
    <td><?php if(isset($mid)) { echo $row1['eaddress'];}?></td>
  </tr>
</table>
 <p style="text-align:center;font-weight:bold;margin-top:10px;color:#F00" > REFERENCE CONTACT DETAILS</p>
<table width="1051" border="1" align="center" style="color:#000;font-size:16px">
  <tr style="background:#CCC">
    <th width="152" height="35" scope="col" nowrap="nowrap">Reference Name</th>
    <th width="162" scope="col">CNIC</th>
    <th width="169" scope="col">Mobile</th>
    <th width="231" scope="col">Service/Business</th>
    <th width="303" scope="col">Address</th>
  </tr>
  <tr align="center">
    <td height="37"><?php if(isset($mid)){ echo $row['Refname'];}?></td>
    <td><?php if(isset($mid)) { echo $row['Refcnic'];}?></td>
    <td><?php if(isset($mid)){ echo $row['Refmobile'];}?></td>
    <td><?php if(isset($mid)) { echo $row['Service'];}?></td>
    <td><?php if(isset($mid)) { echo $row['Refaddress'];}?></td>
  </tr>
</table>
<p style="text-align:center;font-weight:bold;margin-top:10px;color:#F00">NOMINATED GUESTS DETAILS HERE</p>
<?php
	$row2=mysql_fetch_array($query2);
		if($row2!=0)
		{
			
?>
<table width="1051" border="1" align="center" style="color:#000;font-size:16px">
  <tr style="background:#CCC">
    <th width="152" height="35" scope="col" nowrap="nowrap">Guest Names</th>
    <th width="240" scope="col">CNIC</th>
    <th width="281" scope="col">Mobile</th>
    <th width="350" scope="col">Address</th>
  </tr>
  <tr align="center">
    <td height="37"><?php if(isset($mid)){ echo $row2['name1'];}?></td>
    <td><?php if(isset($mid)) { echo $row2['cnic1'];}?></td>
    <td><?php if(isset($mid)){ echo $row2['mobile1'];}?></td>
    <td><?php if(isset($mid)) { echo $row2['address1'];}?></td>
  </tr>
  <tr align="center">
    <td height="37"><?php if(isset($mid)){ echo $row2['name2'];}?></td>
    <td><?php if(isset($mid)) { echo $row2['cnic2'];}?></td>
    <td><?php if(isset($mid)){ echo $row2['mobile2'];}?></td>
    <td><?php if(isset($mid)) { echo $row2['address2'];}?></td>
    </tr>
    <tr align="center">
    <td height="37"><?php if(isset($mid)){ echo $row2['name3'];}?></td>
    <td><?php if(isset($mid)) { echo $row2['cnic3'];}?></td>
    <td><?php if(isset($mid)){ echo $row2['mobile3'];}?></td>
    <td><?php if(isset($mid)) { echo $row2['address3'];}?></td>
  </tr>
</table>
<?php }?>

