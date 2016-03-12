<?php
		
		$registration="";
		$regid="";
// select all data from checkin table for search query
			if(isset($_GET['nic'])) 
			 {
				$idcard=$_GET['nic'];
				$query=mysql_query("select * from `checkin` where `NIC` LIKE '$idcard' OR `CardNo` LIKE '$idcard' ORDER BY `Reg_NO` DESC ") or die(mysql_error()); // for Nic number Checking 
				$row=mysql_fetch_array($query);
				$member=$row['Membership'];
				$regid=$row['Reg_NO'];
				$nic=$row['NIC'];
				$card=$row['CardNo'];
				$old_pic=$row['Picture'];
					
					
 // select last record from checkin table query for registration numbr
					 	 $select="SELECT
    `Reg_NO`
    , `Name`
    , `LicenseNO`
    , `Profession`
    , `NIC`
    , `WeaponName`
	, `Membership`
	
FROM
    `ssclub`.`checkin`
ORDER BY `Reg_NO` DESC LIMIT 1;";

					$record=mysql_query($select) or die();
					$fetch=mysql_fetch_array($record);
					$registration=$fetch['Reg_NO']+1;
					}
			 
			// insert data to checkin data
					if(isset($_POST['submit']))
					{
							$dir="picture/";
							
							$name=ltrim($_POST['name']);
							$fname=$_POST['fname'];
							$license=$_POST['license'];
							$profession=$_POST['profession'];
							$idcard1=ltrim($_POST['idcard']);
							$membno=ltrim($_POST['cardno']);
							$phone=ltrim($_POST['phone']);
							$address=$_POST['address'];
							$weapon=ltrim($_POST['weapon']);
							$waeponname=ltrim($_POST['weaponname']);
							$arrivaldate=date('Y-m-d');
							// time conversion to pak standard time
							$offset = 5;
    						$timestamp = time() + ( $offset * 60 * 60 );
     						$time=gmstrftime("%b %d %Y %H:%M:%S", $timestamp) . "\n";
			 				$arrivaltime=date('h:i A',strtotime($time));
							// end of time conversion
							$fire=$_POST['fire'];
							$boothno=ltrim($_POST['boothno']);
							$persons=ltrim($_POST['persons']);
							$charges=ltrim($_POST['charges']);
							$remarks=$_POST['remarks'];
							$membership=$_POST['membership'];
							$s_experience=ltrim($_POST['s_experience']);
							
							// other persons details table 1
							$pname=ltrim($_POST['pname']);
							$pcell=ltrim($_POST['pcell']);
							$pnic=ltrim($_POST['pnic']);
							$paddress=$_POST['paddress'];
							// other person details table 2
							$pname2=ltrim($_POST['pname2']);
							$pcell2=ltrim($_POST['pcell2']);
							$pnic2=ltrim($_POST['pnic2']);
							$paddress2=$_POST['paddress2'];
							
							
							$picture=$_FILES['picture']['name'];
							$tmp_name=$_FILES['picture']['tmp_name'];
							
							
							if($picture!="")
							{
								if(file_exists($dir.$picture))
								{
									$picture=time().'_'.$picture;	
								}	
								$fdir=$dir.$picture;
								move_uploaded_file($tmp_name,$fdir) or die(mysql_error());
								
							}
							// when picture exist beofre
							if($picture=="")
							{
								$picture=$old_pic;
							}
							// when already a member
							if($membership=="")
							{
								$membership=$member;	
							}else {
								$membership;
								}
							if($name!="")
							{
								// insertion into checkin table
								mysql_query("insert into `checkin` values('','$name','$fname','$license','$profession','$idcard1','$membno','$phone','$membership','$address','$picture','$weapon','$waeponname','$arrivaldate','$arrivaltime','','$fire','$boothno','$persons','$charges','$remarks','$s_experience')") or die(mysql_error());
								
									// logdetails tables insertion
									$ofset = 5;
    								$tstamp = time() + ( $offset * 60 * 60 );
     								$timefor=gmstrftime("%b %d %Y %H:%M:%S", $timestamp) . "\n";
			 						$date=date('Y-m-d h:i A',strtotime($time));
									$uid=$_SESSION['u_id'];
									
								mysql_query("insert into  `logs` values('','$date','$uid','Checkin','$registration')") or die(mysql_error());	
								
								if($pname!="")
								{
									// insertion into persondetails 1
								mysql_query("insert into `persondetails` values ('','$pname','$pcell','$pnic','$paddress','$registration')") or die();	
								}
								if($pname2!="")
								{
								 mysql_query("insert into `persondetails2` values('','$pname2','$pcell2','$pnic2','$paddress2','$registration')") or die();	
								}
							}
							
							
							
							header("Location:index.php?page=searchid&msg=Record Insert Successfully");
						}
			
			
			?>
  
   
 
<div align="center" style="font-weight:bolder;color:#000;margin-top:0px;"><u><h4>CHECK IN</h4></u></div>
<div align="center" style="color:#000;margin:20px;"><strong>Reg NO:&nbsp&nbsp<?php  echo $registration;?> </strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php if($member=="Silver") {?><span style="background:#C0C0C0;padding:10px;"><strong><?php  echo $member;?> </strong> </span> <?php }?> <?php if($member=="Gold"){?><span style="background:#DAA520;padding:10px;"><strong><?php  echo $member;?> </strong> </span> <?php }?> <?php if($member=="Platinum") {?><span style="background:#EDEDEF;padding:10px;"><strong><?php  echo $member;?> </strong></span>&nbsp;&nbsp;&nbsp;&nbsp; <?php }?>
 <!---check valid date from memebership and compare with checkin talbe-->
 
<span style="background:#FFF;padding:10px;">
   <?php 
   	if($member=="Silver" || $member=="Gold" || $member=="Platinum")
	{
	$date=date('Y-m-d');
	$expquery=mysql_query("select * from `membership` where `Cnic`='$idcard' OR `CardNo`='$idcard'") or die();
    $rowexp=mysql_fetch_array($expquery);
	$expiredate=$rowexp['Validto'];
	
	   if($date>$expiredate)
	 { 
	 echo '<span style="color:red;font-size:16px;">Membership Expired</span>'; 
	 }
	 else
	 {
	echo '<b>Membership Expired On'.'&nbsp;&nbsp;'.$expiredate."</b>";
	 }
	 }
	 ?>
     </span>
     
 </div>
<div align="center" style="color:#000">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="1030" height="481" border="1" align="center" style="border:#666 1px solid;font-size:16px;">
    <tr align="center">
      <td width="134" height="55"><strong>Name:</strong></td>
      <td width="295"><input type="text" name="name" id="name" value="<?php if(isset($idcard)) {echo $row['Name'];} ?>" required/></td>
      <td height="55" nowrap="nowrap"><strong>Father Name</strong></td>
      <td height="55"><input type="text" name="fname" id="fname" value="<?php if(isset($idcard)) {echo $row['fname'];} ?>" required="required"/></td>
    </tr>
    <tr align="center">
      <td height="52"><strong>License NO</strong></td>
      <td height="52"><input type="text" name="license" id="license" value="<?php if(isset($idcard)) {echo $row['LicenseNO'];} ?>" required="required"/></td>
      <td width="167" nowrap="nowrap"><strong>Card No</strong></td>
      <td width="406"><input type="text" name="cardno" id="cardno" value="<?php if($idcard==$card){ echo $card;}else if($idcard!=$card){echo $card;}?>"/></td>
    </tr>
    <tr align="center">
      <td height="51" nowrap="nowrap" ><strong>NIC NO:</strong></td>
      <td height="51" nowrap="nowrap" ><input type="text" name="idcard" id="idcard" value="<?php if($idcard==$nic){echo $nic;}else if($idcard!=$nic && $idcard!=$card){echo $idcard;}else if($idcard==$card){ echo $nic;}?>" required="required"/></td>
      <td height="51" nowrap="nowrap" ><strong>Telephone No:</strong></td>
      <td height="51" nowrap="nowrap" ><input type="text" name="phone" id="phone" value="<?php if(isset($idcard)){ echo $row['TelephoneNo'];}?>" required="required"/>
     
  	  </td>
      </tr>
    <tr align="center">
      <td><strong>MemberShip:</strong></td>
      <td style="font-size:36px;font-weight:bold;font-family:'MS Serif', 'New York', serif;">
      	<?php 
					if($member=="Gold" || $member=="Silver" || $member=="Platinum" || $member=="Walkin")
					{
		
					 echo "$member";
					 
					 
					}
		?>
      <select name="membership" id="membership" style="margin-top:20px;">
      <option selected="selected" value="">--SELECT MEMEBERSHIPS---</option>
      <option value="Silver">---SILVER---</option>
      <option value="Gold">---GOLD---</option>
      <option value="Platinum">---PLATINIUM---</option>
       <option value="Walkin">---WALKIN---</option>
     </select>
    
     
    
      </td>
      <td nowrap="nowrap"><strong>Address :</strong></td>
      <td><textarea name="address" id="address" cols="50" rows="5" style="width:400px;"><?php if(isset($idcard)){ echo $row['Address'];}?>
      </textarea></td>
      </tr>
    <tr align="center">
      <td height="44" nowrap="nowrap"><strong>Upload Picture:</strong></td>
      <td nowrap="nowrap"><?php if(isset($idcard)){?><img src="picture/<?php echo $row['Picture'];?>" width="100" height="100"><?php }?> <?php  if(isset($row['Picture'])=="") {?><input type="file" name="picture" id="picture" value="" required/> <?php  }?></td>
      <td><strong>Weapon: </strong></td>
      <td><label class="radio">
        <input type="radio" name="weapon" value="self" checked="checked"/>
        Self </label>
        <label class="radio">
          <input type="radio" name="weapon" value="club"  />
        Club </label></td>
    </tr>
    <tr align="center">
      <td height="44" nowrap="nowrap"><strong>Weapon Name/NO</strong></td>
      <td nowrap="nowrap"><input type="text" name="weaponname" id="weaponname" value="<?php  if(isset($idcard)){ echo $row['WeaponName'];}?>" required="required"/></td>
      <td nowrap="nowrap"><strong>Profession:</strong></td>
      <td nowrap="nowrap"><input type="text" name="profession" id="profession" class="input-large" value="<?php  if(isset($idcard)){ echo $row['Profession'];}?>" required="required"/></td>
    </tr>
     <tr align="center">
      <td height="35" nowrap="nowrap"><strong>No of Fire</strong></td>
      <td nowrap="nowrap"><input type="text" name="fire" id="fire" value="<?php if(isset($idcard)){ echo $row['Fire'];}?>"/></td>
      <td nowrap="nowrap"><strong>Shooting Experience</strong></td>
      <td nowrap="nowrap"><input type="text" name="s_experience" id="s_experience" value="<?php if(isset($idcard)){echo $row['s_experience'];}?>"/></td>
    </tr>
     <tr align="center">
       <td height="29" nowrap="nowrap"><strong>Date</strong></td>
       <td nowrap="nowrap"><?php if(isset($idcard)){ echo $row['ArrivalDate'];}?></td>
       <td nowrap="nowrap">&nbsp;</td>
       <td nowrap="nowrap">&nbsp;</td>
     </tr>
  </table>
 

<table width="1031" height="73" border="1" style="font-size:16px;margin-top:20px">
    <tr>
      <th width="230" height="34" nowrap="nowrap" scope="col"><span id="show" style="margin-right:5px"></span><stong>Booth No:</stong></th>
      <th width="196" scope="col"><strong>No of Persons</strong></th>
      <th width="274" nowrap="nowrap" scope="col"><strong>Range Charges</strong></th>
      <th width="303" scope="col"><strong>Remarks</strong></th>
    </tr>
    <tr>
      <td><input type="text" name="boothno" id="boothno" value="" required/></td>
      <td><input type="text" name="persons" id="noofperson" value="" onkeyup="showTable();"/></td>
      <td><input type="text" name="charges" id="charges" value="<?php if(isset($idcard)){ echo $row['RangeCharge'];}?>" required/></td>
      <td><input type="text" name="remarks" id="remarks" value="<?php if(isset($idcard)){echo $row['Remarks'];}?>" /></td>
    </tr>
    </table>
  <div align="center"  id="hide">
  <?php
		// First person Details
		$qry=mysql_query("select * from `persondetails` where `Reg_NO`='$regid'") or die();
		$result=mysql_fetch_array($qry);
		$person=$row['Persons'];
		
		// second Persons Details
		$qry1=mysql_query("select * from `persondetails2` where `Reg_NO`='$regid'") or die();
		$result1=mysql_fetch_array($qry1);
		
?>

<table width="899" border="1" cellpadding="5" id="table" style="margin-top:10px;" onload="loadImage()">
<tr align="center">
<td width="193"><strong>Name</strong></td>
<td width="220"><strong>Cell No</strong></td>
<td width="220"><strong>NIC</strong></td>
<td width="206"><strong>Address</strong></td>
<tr align="center">
  <td><input type="text" name="pname" value="<?php echo $result['pname'];?>"></td>
  <td width="220"><input type="text" name="pcell" id="pcell" value="<?php echo $result['pcell'];?>"></td>
  <td width="220"><input type="text" name="pnic" id="nic"  value="<?php echo $result['pnic'];?>"></td>
  <td width="206"><input type="text" name="paddress"  value="<?php echo $result['paddress'];?>"></td>
<tr align="center">
  <td><input type="text" name="pname2" value="<?php echo $result1['pname2'];?>"></td>
  <td width="220"><input type="text" name="pcell2" value="<?php echo $result1['pcell2'];?>"></td>
  <td width="220"><input type="text" name="pnic2" id="nic2" value="<?php echo $result1['pnic2'];?>"></td>
  <td width="206"><input type="text" name="paddress2" value="<?php echo $result1['paddress2'];?>"></td>
</table>

  </div>
<div>The guset house and management hold no responsibilty for any loss of valueable assets & cash if not desposited.</div>
<div align="center" style="padding-top:20px;" id="noPrint">
        <input type="submit" name="submit" class="btn btn-large btn-primary" value="Save">
</div>

</form>
</div>
