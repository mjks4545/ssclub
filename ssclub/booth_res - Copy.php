<?php
		
		$Booth_no="";
				
				
			
			// select all data from checkin table for search query
			
			if(isset($_GET['B_No']))
			{
				 	 $Booth_no=$_GET['B_No'];
					
					
				 	$query=mysql_query("select * from `checkin` where `BoothNo` LIKE '$Booth_no' ORDER BY Reg_NO DESC") or die(mysql_error()); // for Booth Number Checking 
					$row=mysql_fetch_array($query);
					
					$member=$row['Membership'];
					 $regid=$row['Reg_NO'];
					 $nic=$row['NIC'];
					 $card=$row['CardNo'];
					 $timein=$row['ArrivalTime'];
					 
					$q=mysql_query("select * from `persondetails`  where `Reg_NO`='$regid'") or die(mysql_error()); // for Personal info Checking 
					 $row2=mysql_fetch_array($q);
					 
					 $query3=mysql_query("select * from `persondetails2` where `Reg_No`='$regid'") or die();
					 $row3=mysql_fetch_array($query3);
					 
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
							
							$name=$_POST['name'];
							$license=$_POST['license'];
							$profession=$_POST['profession'];
							$idcard=$_POST['idcard'];
							$membno=$_POST['cardno'];
							
							$address=$_POST['address'];
							$weapon=$_POST['weapon'];
							$waeponname=$_POST['weaponname'];
							$arrivaldate=date("m/d/Y");
							// time conversion to pak standard time
							$offset = 5;
    						$timestamp = time() + ( $offset * 60 * 60 );
     						$time=gmstrftime("%b %d %Y %H:%M:%S", $timestamp) . "\n";
			 				$arrivaltime=date('h:i A',strtotime($time));
							//$oTime=date('h:i A',strtotime($time));
							// end of time conversion
							
							$fire=$_POST['fire'];
							$boothno=$_POST['boothno'];
							$persons=$_POST['persons'];
							$charges=$_POST['charges'];
							$remarks=$_POST['remarks'];
							
							
							// other persons details table 1
							$pname=$_POST['pname'];
							$pcell=$_POST['pcell'];
							$paddress=$_POST['paddress'];
							
							// other person details table 2
							$pname2=$_POST['pname2'];
							$pcell2=$_POST['pcell2'];
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
								
							if($name!="")
							{
								// Changes into checkin table
								// time conversion to pak standard time
							$offset = 5;
    						$timestamp = time() + ( $offset * 60 * 60 );
     						$time=gmstrftime("%b %d %Y %H:%M:%S", $timestamp) . "\n";
			 				$otime=date('h:i A',strtotime($time));
								
								mysql_query("UPDATE `checkin` SET 
								`Name`='$name',
								`LicenseNO`='$license',
								`Profession`='$profession',
								`NIC`='$nic',
								`CardNo`='$card',
								`Address`='$address',
								`Weapon`='$weapon',
								`WeaponName`='$waeponname',
								`TimeOut`='$otime',
								`Fire`='$fire',
								`BoothNo`='$Booth_no',
								`Persons`='$persons',
								`RangeCharge`='$charges',
								`Remarks`='$remarks' WHERE `Reg_NO`=$regid")  or die(mysql_error());
								
									// logdetails tables insertion
								$uid=$_SESSION['u_id'];
								//mysql_query("insert into  `logdetails` values('','Add record','checkin','$registration','$uid')") or die(mysql_error());	
								
								if($pname!="")
								{
									// insertion into persondetails 1
								mysql_query("update `persondetails` set `pname`='$pname',`pcell`='$pcell',`paddress`='$paddress' WHERE `Reg_NO`='$regid')") or die();	
								
								}
								
								if($pname2!="")
								{
								mysql_query("update `persondetails2` set `pname2`='$pname2',`pcell2`='$pcell2',`paddress2`=`$paddress2' WHERE `Reg_No`='$regid')") or die();		
								
								}
								
							}
							
							header("Location:index.php?page=bill&name=$name&profession=$profession&address=$address&card=$membno&regid=$regid&boothno=$boothno&persons=$persons&member=$member&arrivaldate=$arrivaldate&arrivaltime=$timein&otime=$otime&charges=$charges&fire=$fire&remarks=$remarks");
						
						}
			
			
			?>
<div align="center" style="font-weight:bolder;color:#000;margin-top:50px;"><u><h4>Booth Record</h4></u></div>
<div align="center" style="color:#000;margin:20px;"> <strong>Reg NO:&nbsp&nbsp<?php  echo $registration; ?> </strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php if($member=="Silver") {?><span style="background:#C0C0C0;padding:10px;"><strong><?php  echo $member;?> </strong> </span> <?php }?> <?php if($member=="Gold"){?><span style="background:#DAA520;padding:10px;"><strong><?php  echo $member;?> </strong> </span> <?php }?> <?php if($member=="Platinum") {?><span style="background:#EDEDEF;padding:10px;"><strong><?php  echo $member;?> </strong> </span> <?php }?> </div>
<div align="center" style="color:#000">
<form action="" method="post" enctype="multipart/form-data">
  <table width="683" height="346" border="1" align="center" style="border:#666 1px solid">
    <tr align="center">
      <td width="121" height="38"><strong>Name:</strong></td>
      <td width="273"><input type="text" name="name" id="name" value="<?php if(isset($Booth_no)) {echo $row['Name'];} ?>"/></td>
      <td height="38" nowrap="nowrap"><strong>License NO</strong></td>
      <td height="38"><input type="text" name="license" id="license" value="<?php echo $row['LicenseNO']; ?>" /></td>
    </tr>
    <tr align="center">
      <td height="50"><strong>Profession:</strong></td>
      <td height="50"><input type="text" name="profession" id="profession" class="input-large" value="<?php  if(isset($Booth_no)){ echo $row['Profession'];}?>"/></td>
      <td width="103" nowrap="nowrap"><strong>NIC NO:</strong></td>
      <td width="218"><input type="text" name="idcard" id="idcard" value="<?php  if($Booth_no){ echo $row['NIC'];} ?>" /></td>
    </tr>
    <tr align="center">
      <td height="51" nowrap="nowrap" ><strong>Arrival Time:</strong></td>
      <td height="51" nowrap="nowrap" ><input type="text" readonly name="atime" id="atime" value="<?php if(isset($Booth_no)){ echo $row['ArrivalTime'];}?>" /></td>
    
  	<td><strong>Membership</strong></td>
      
      
       
      <td height="51" nowrap="nowrap" ><?php if(isset($Booth_no)){ echo $member;}?></td>
     
    
  	</td>
      
      </tr>
      
    <tr align="center">
      <td colspan="2"><strong>Address :</strong>        <textarea name="address" id="address" cols="50" rows="5" style="width:400px;"><?php if(isset($Booth_no)){ echo $row['Address'];}?></textarea></td>
      <td nowrap="nowrap"><strong>Upload Picture:</strong></td>
      <td><?php if(isset($idcard)){?><img src="picture/<?php echo $row['Picture'];?>" width="100" height="100"><?php }?> <?php  if(isset($row['Picture'])=="") {?><input type="file" name="picture" id="picture" value=""/> <?php  }?></td>
      </tr>
    <tr align="center">
      <td nowrap="nowrap"><strong>Weapon: </strong>
          
        </td>
      <td nowrap="nowrap"><label class="radio">
                                            <input type="radio" name="weapon" value="self" />
                                            Self
          </label>
                                        <label class="radio">
                                            <input type="radio" name="weapon" value="club" checked />
                                            Club
                                        </label></td>
      <td><strong>Weapon Name</strong></td>
      <td><input type="text" name="weaponname" id="weaponname" value="<?php echo $row['WeaponName'];   ?>"/></td>
    </tr>
    <tr align="center">
      <td nowrap="nowrap"><strong>Card No</strong></td>
      <td nowrap="nowrap"><input type="text" name="cardno" id="cardno" value="<?php if($Booth_no){ echo $row['CardNo'];}?>" /></td>
      <td nowrap="nowrap"><strong>No of Fire</strong></td>
      <td nowrap="nowrap"><input type="text" name="fire" id="fire" value="<?php echo $row['Fire'];   ?>" /></td>
    </tr>
    
  </table>
<div></div>  
<table width="735" height="73" border="1">
    <tr>
      <th width="101" height="34" nowrap="nowrap" scope="col"><stong>Booth No:</stong></th>
      <th width="188" scope="col"><strong>No of Persons</strong></th>
      <th width="232" nowrap="nowrap" scope="col"><strong>Range Charge</strong></th>
      <th width="186" scope="col"><strong>Remarks</strong></th>
    </tr>
    <tr>
      <td><input type="text" name="boothno" id="boothno" value="<?php echo $row['BoothNo']; ?>" /></td>
      <td><input type="text" name="persons" id="noofperson" value="<?php echo $row['Persons']; ?>" onkeyup="showTable();"/></td>
      <td><input type="text" name="charges" id="charges" value="<?php echo $row['RangeCharge']; ?>"/></td>
      <td><input type="text" name="remarks" id="remarks" value="<?php echo $row['Remarks']; ?>"/></td>
    </tr>
  </table>
  <div align="center">
    <table width="900" border="1" cellpadding="5" id="table" >
      <tr align="center">
        <td width="256"><strong>Name</strong></td>
        <td width="317"><strong>Cell No</strong></td>
        <td width="281"><strong>Address</strong></td>
      </tr>
      <tr align="center">
        <td><input type="text" name="pname" value="<?php echo $row2['pname'];?>" /></td>
        <td width="317"><input type="text" name="pcell" id="pcell" value="<?php echo $row2['pcell'];?>" /></td>
        <td width="281"><input type="text" name="paddress" value="<?php echo $row2['paddress'];?>" /></td>
      </tr>
      <tr align="center">
        <td><input type="text" name="pname2" value="<?php echo $row3['pname2'];?>"/></td>
        <td width="317"><input type="text" name="pcell2" value="<?php echo $row3['pcell2'];?>"/></td>
        <td width="281"><input type="text" name="paddress2" value="<?php echo $row3['paddress2'];?>"/></td>
      </tr>
    </table>
  </div>
<div>The guset house and management hold no responsibilty for any loss of valueable assets & cash if not desposited.</div>
  
        <div align="center" style="padding-top:20px;" id="noPrint">
        <input type="submit" name="submit" class="btn btn-large btn-primary" value="Checkout"> 
        </div>

</form>
</div>
