<?php
			error_reporting(0);
			if(isset($_GET['id']))
			{
			// fetch records
			$id=$_GET['id'];
			$qry=mysql_query("select * from `membership` where `M_id`='$id'") or die(mysql_error());
			$qry1=mysql_query("select * from `emergency_details` where `M_id`='$id'") or die(mysql_error());
			$qry2=mysql_query("select * from `nominated_guests` where `M_id`='$id'") or die(mysql_error());
			
			$row=mysql_fetch_array($qry);
			$row1=mysql_fetch_array($qry1);
			$row2=mysql_fetch_array($qry2);
		 	$member=$row['Membership'];
			$type=$row['schedule'];
			$pic=$row['Picture'];
		
			
			// update recors
			if(isset($_POST['submit']))
				{
						
						$dir="picture/";
						$name=ltrim($_POST['name']);
						$fname=ltrim($_POST['fname']);
						$datebith=$_POST['datebirth'];
						$cnic=ltrim($_POST['cnic']);
						$mobile=ltrim($_POST['mobile']);
						$address=$_POST['address'];
						
						// picture upload file
						$img=$_FILES['image']['name'];
						$tmpname=$_FILES['image']['tmp_name'];
						
						$membership=$_POST['membership'];
						$cardno=ltrim($_POST['cardno']);
						$validfrom=$_POST['validfrom'];
						$validto=$_POST['validto'];
						$license=ltrim($_POST['licenseno']);
						$mservice=$_POST['mservice'];
						$fee=$_POST['fee'];
						$payments=$_POST['payments'];
						// add more
						$education=$_POST['qualification'];
						$emploment=$_POST['employment'];
						$no_weapons=$_POST['noweapon'];
						$t_weapon=$_POST['t_weapon'];
						$criminal=$_POST['criminal'];
						$s_experience=$_POST['s_experience'];
						$weapon=$_POST['weapon'];
						
						
						// emergency details here
						
						$ename=$_POST['ename'];
						$ecnic=$_POST['ecnic'];
						$emobile=$_POST['emobile'];
						$eservice=$_POST['eservice'];
						$eaddress=$_POST['eaddress'];
						
						// Reference Number
						$refname=$_POST['refname'];
						$refcnic=$_POST['refcnic'];
						$refmobile=$_POST['refmobile'];
						$service=$_POST['service'];
						$refaddress=$_POST['refaddress'];
						
						// Nominated Guests
						// 1st guest
						$gname1=$_POST['gname1'];
						$gcnic1=$_POST['gcnic1'];
						$gmobile1=$_POST['gmobile1'];
						$gaddress1=$_POST['gaddress1'];
						// 2nd guest
						$gname2=$_POST['gname2'];
						$gcnic2=$_POST['gcnic2'];
						$gmobile2=$_POST['gmobile2'];
						$gaddress2=$_POST['gaddress2'];
						// 3rd guest
						$gname3=$_POST['gname3'];
						$gcnic3=$_POST['gcnic3'];
						$gmobile3=$_POST['gmobile3'];
						$gaddress3=$_POST['gaddress3'];
						
						$mid=$_GET['id'];
						$qry3=mysql_query("select `Picture` from `membership` where `M_id`='$mid'") or die(mysql_error());
						$row3=mysql_fetch_array($qry3);
					  	$old_pic=$row3[0];
						
					// check old picture
						if($img!="")
							{
								if(file_exists($dir.$img))
								{
									$img=time().'_'.$img;	
								}	
							
				 			$fdir=$dir.$img;
				 			 move_uploaded_file($tmpname,$fdir) or die(mysql_error());
							}
							if($img=="")
							{
								$img=$old_pic;
							}
				  	 mysql_query("update `membership` set  `Name`='$name',`Cnic`='$cnic',`fname`='$fname',`date_birth`='$datebith',`Mobile`='$mobile',`Address`='$address',`mservice`='$mservice',`Picture`='$img',`Membership`='$membership',`CardNo`='$cardno',`Validfrom`='$validto',`Validto`='$validfrom',`Licenseno`='$license',`Refname`='$refname',`Refcnic`='$refcnic',`Refmobile`='$refmobile',`Service`='$service',`Refaddress`='$refaddress',`schedule`='$fee',`payments`='$payments',`Education`='$education',`criminal`='$criminal',`employment`='$emploment',`no_weapon`='$no_weapons',`t_weapon`='$t_weapon',`s_experience`='$s_experience',`weapon_name`='$weapon' where `M_id`='$mid'") or die();
							
					mysql_query("update `emergency_details` set `ename`='$ename',`ecnic`='$ecnic',`emobile`='$emobile',`eservices`='$eservice',`eaddress`='$eaddress' where `M_id`='$mid'") or die(mysql_error());
								
						// insertion into nominated  guests
					 mysql_query("update `nominated_guests` set `name1`='$gname1',`cnic1`='$gcnic1',`mobile1`='$gmobile1',`address1`='$gaddress1',`name2`='$gname2',`cnic2`='$gcnic2',`mobile2`='$gmobile2',`address2`='$gaddress2',`name3`='$gname3',`cnic3`='$gcnic3',`mobile3`='$gmobile3',`address3`='$gaddress3' where `M_id`='$mid'") or die(mysql_error());
					header("Location:index.php?page=membership&msg=Record Update Successfully");
				}
					
			}	
			
		
	
?>
<div align="center" style="font-size:16px;color:#000;"><?php if(isset($_GET['msg'])){ echo $_GET['msg'];}?></div>
<div align="center" style="font-size:16px;color:#000;"><strong>Update Recrod</strong></div>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" style="color:#000;font-size:16px;margin-top:20px;">
  <table width="1114" border="1" align="center">
     <tr align="center">
      <th width="166" height="47" scope="row">Name</th>
      <td width="339"><input type="text" name="name" id="name" value="<?php echo $row['Name'];?>"/></td>
      <td width="162"><strong>Father Name</strong></td>
      <td width="419"><input type="text" name="fname" id="fname" value="<?php echo $row['fname'];?>"/></td>
    </tr>
    <tr align="center">
      <th width="166" height="47" scope="row">CNIC</th>
      <td width="339"><input type="text" name="cnic" id="cnic" value="<?php echo $row['Cnic'];?>"/></td>
      <td width="162"><strong>Date of Birth</strong></td>
      <td width="419"><input type="date" name="datebirth" id="datebirth" value="<?php echo $row['date_birth'];?>"/></td>
    </tr>
    <tr align="center">
      <th height="56" scope="row">Mobile</th>
      <td><input type="text" name="mobile" id="mobile" value="<?php echo $row['Mobile'];?>"/></td>
      <td><strong>Address</strong></td>
      <td><label for="textarea"></label>
      <textarea name="address" id="textarea" cols="45" rows="5"><?php echo $row['Address'];?></textarea></td>
    </tr>
    <tr align="center">
      <th height="52" scope="row">UPLOAD Picutre </th>
      <td align="center"><?php if($pic==""){?><input type="file" name="image" id="image"/><?php }?><span style="margin-left:100px;"><?php if(isset($id)){?><img src="Picture/<?php echo $row['Picture'];?>" width="100"  height="100"><?php }?></span></td>
      <td><strong>MemberShip </strong></td>
      <td><select name="membership" id="membership">
      <option selected="selected" value="">--SELECT MEMEBERSHIPS---</option>
      <option value="Silver" <?php if($member=='Silver'){ echo 'selected="selected"';}?>>---SILVER---</option>
      <option value="Gold" <?php if($member=='Gold'){ echo 'selected="selected"';}?>>---GOLD---</option>
      <option value="Platinum" <?php if($member=='Platinum'){ echo 'selected="selected"';}?>>---PLATINIUM---</option>
     </select></td>
    </tr>
    <tr align="center">
      <th height="61" scope="row"><strong>Card NO</strong></th>
      <td><input type="text" name="cardno" id="cardno" value="<?php echo $row['CardNo'];?>" /></td>
      <td><strong>License No</strong></td>
      <td><input type="text" name="licenseno" id="licenseno" value="<?php echo $row['Licenseno'];?>"/></td>
    </tr>
    <tr align="center">
      <th height="36" scope="row"><strong>Valide From</strong></th>
      <td><input type="date" name="validto" id="validto" value="<?php echo $row['Validfrom'];?>"/></td>
      <td><strong>Valid To</strong></td>
      <td><input type="date" name="validfrom" id="validfrom" value="<?php echo $row['Validto'];?>"/></td>
    </tr>
     <tr align="center">
      <th height="36" scope="row"><strong>Fee Schedule</strong></th>
      <td><select name="fee" id="fee">
      <option selected="selected" value="">---Fee Schedule---</option>
      <option value="membership" <?php if($type=='membership'){ echo 'selected="selected"';}?>>Membership</option>
      <option value="monlty" <?php if($type=='monlty'){ echo 'selected="selected"';}?>>Monthly</option>
      <option value="yearly"  <?php if($type=='yearly'){ echo 'selected="selected"';}?>>Yearly</option>
      </select></td>
      <td><strong>Payments</strong></td>
      <td><input type="text" name="payments" id="payments" value="<?php echo $row['payments'];?>"/></td>
    </tr>
    <tr align="center">
      <th height="37" scope="row"><strong>Service/ Business</strong></th>
      <td><input type="text" name="mservice" id="mservice" value="<?php echo $row['mservice'];?>"/></td>
      <td nowrap="nowrap"><strong>Education Qualification</strong></td>
      <td><input type="text" name="qualification" id="qualification" value="<?php echo $row['Education'];?>" /></td>
    </tr>
     <tr align="center">
      <th height="37" scope="row"><strong>Current Employment</strong></th>
      <td><input type="text" name="employment" id="employment" value="<?php echo $row['employment'];?>"/></td>
      <td><strong>NO of Weapon</strong></td>
      <td><input type="text" name="noweapon" id="noweapon" value="<?php echo $row['no_weapon'];?>"/></td>
    </tr>
     <tr align="center">
      <th height="37" scope="row"><strong>Type of Weapon</strong></th>
      <td><textarea name="t_weapon" id="t_weapon" cols="45" rows="5"><?php echo $row['t_weapon'];?></textarea></td>
      <td><strong>Any Conviction</strong></td>
      <td><input type="text" name="criminal" id="criminal" value="<?php echo $row['criminal'];?>"/></td>
    </tr>
     <tr align="center">
      <th height="37" scope="row"><strong>Shooting Experience</strong></th>
      <td><input type="text" name="s_experience" id="s_experience" value="<?php echo $row['s_experience'];?>"/></td>
      <td><strong>Weapon Name/NO</strong></td>
      <td><input type="text" name="weapon" id="weapon" value="<?php echo $row['weapon_name'];?>"/></td>
    </tr>
  </table>
  <p style="text-align:center;font-weight:bold;margin-top:10px;color:#F00" > IN CASE OF EMERGENCY CONTACT DETAILS</p>
  <table width="805" border="1" align="center" style="color:#000;font-size:16px">
    <tr>
      <th width="129" height="35" scope="col" nowrap="nowrap">Name</th>
      <th width="156" scope="col">CNIC</th>
      <th width="176" scope="col">Mobile</th>
      <th width="186" scope="col">Service/Business</th>
      <th width="124" scope="col">Address</th>
    </tr>
    <tr>
      <td height="37"><input type="text" name="ename" id="ename" value="<?php echo $row1['ename'];?>"/></td>
      <td><input type="text" name="ecnic" id="ecnic" value="<?php echo $row1['ecnic'];?>"/></td>
      <td><input type="text" name="emobile" id="emobile" value="<?php echo $row1['emobile'];?>"/></td>
      <td><input type="text" name="eservice" id="eservice" value="<?php echo $row1['eservices'];?>"/></td>
      <td><textarea name="eaddress" id="eaddress" cols="45" rows="5"><?php echo $row1['eaddress'];?></textarea></td>
    </tr>
  </table>
  <p style="text-align:center;font-weight:bold;margin-top:10px;color:#F00" > REFERENCE CONTACT DETAILS</p>
  <table width="954" border="1" align="center" style="color:#000;font-size:16px">
    <tr>
      <th width="144" height="35" scope="col" nowrap="nowrap">Reference Name</th>
      <th width="144" scope="col">CNIC</th>
      <th width="144" scope="col">Mobile</th>
      <th width="202" scope="col">Service/Business</th>
      <th width="286" scope="col">Address</th>
    </tr>
    <tr>
      <td height="87"><input type="text" name="refname" id="refname" value="<?php echo $row['Refname'];?>"></td>
      <td><input type="text" name="refcnic" id="refcnic" value="<?php echo $row['Refcnic'];?>"/></td>
      <td><input type="text" name="refmobile" id="refmobile" value="<?php echo $row['Refmobile'];?>"/></td>
      <td><input type="text" name="service" id="service" value="<?php echo $row['Service'];?>"/></td>
      <td><label for="refaddress"></label>
      <textarea name="refaddress" id="refaddress" cols="45" rows="5"><?php echo $row['Refaddress'];?></textarea></td>
    </tr>
   </table>
  <p style="text-align:center;font-weight:bold;margin-top:10px;color:#F00" > Nominated Guests </p>
  <table width="1123" border="1" align="center" style="color:#000;font-size:16px">
    <tr>
      <th width="285" height="35" scope="col" nowrap="nowrap"> Name</th>
      <th width="217" scope="col">CNIC</th>
      <th width="275" scope="col">Mobile</th>
      <th width="318" scope="col">Address</th>
    </tr>
    <tr align="center">
      <td height="87"><input type="text" name="gname1" id="gname1" value="<?php echo $row2['name1'];?>"/></td>
      <td><input type="text" name="gcnic1" id="gcnic1" value="<?php echo $row2['cnic1'];?>"/></td>
      <td><input type="text" name="gmobile1" id="gmobile1" value="<?php echo $row2['mobile1'];?>"/></td>
      <td><label for="gaddress1"></label>
      <textarea name="gaddress1" id="gaddress1" cols="45" rows="5"><?php echo $row2['address1'];?></textarea></td>
    </tr>
    <tr align="center">
      <td height="87"><input type="text" name="gname2" id="gname2" value="<?php echo $row2['name2'];?>"/></td>
      <td><input type="text" name="gcnic2" id="gcnic2" value="<?php echo $row2['cnic2'];?>"/></td>
      <td><input type="text" name="gmobile2" id="gmobile2" value="<?php echo $row2['mobile2'];?>"/></td>
      <td><label for="gaddress1"></label>
      <textarea name="gaddress2" id="gaddress2" cols="45" rows="5"><?php echo $row2['address2'];?></textarea></td>
    </tr>
    <tr align="center">
      <td height="87"><input type="text" name="gname3" id="gname3" value="<?php echo $row2['name3'];?>"/></td>
      <td><input type="text" name="gcnic3" id="gcnic3" value="<?php echo $row2['cnic3'];?>"/></td>
      <td><input type="text" name="gmobile3" id="gmobile3" value="<?php echo $row2['mobile3'];?>"/></td>
      <td><label for="gaddress1"></label>
      <textarea name="gaddress3" id="gaddress3" cols="45" rows="5"><?php echo $row2['address3'];?></textarea></td>
    </tr>
  </table>
  <div align="center" style="margin-top:10px;"><input type="submit" name="submit" class="btn btn-large btn-primary" value="SAVE"></div>
  </form>


