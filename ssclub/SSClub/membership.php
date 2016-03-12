<?php
				if(isset($_POST['submit']))
				{
						$dir="picture/";
						$name=ltrim($_POST['name']);
						$fname=$_POST['fname'];
						$dateofbirth=$_POST['datebirth'];
						$cnic=ltrim($_POST['cnic']);
						$mobile=ltrim($_POST['mobile']);
						$address=$_POST['address'];
						
						// picture upload file
						$picutre=$_FILES['picture']['name'];
						$tmpname=$_FILES['picture']['tmp_name'];
						
						$membership=$_POST['membership'];
						$cardno=ltrim($_POST['cardno']);
						$validfrom=$_POST['validfrom'];
						$validto=$_POST['validto'];
						$license=ltrim($_POST['licenseno']);
						$mservice=ltrim($_POST['mservice']);
						$fee=ltrim($_POST['fee']);
						$payments=ltrim($_POST['payments']);
						// add more
						$education=$_POST['qualification'];
						$emploment=$_POST['employment'];
						$no_weapons=ltrim($_POST['noweapon']);
						$t_weapon=ltrim($_POST['t_weapon']);
						$criminal=ltrim($_POST['criminal']);
						$s_experience=ltrim($_POST['s_experience']);
						$weapon=ltrim($_POST['weapon']);
						
						
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
						
						
						if($picutre!="")
					{
							if(file_exists($dir.$picutre))
							{
								$picutre=time().'_'.$picutre;	
							}
						$fdir=$dir.$picutre;
						move_uploaded_file($tmpname,$fdir) or die(mysql_error());
					}
					
					if($name!="")
					{
						mysql_query("insert into `membership` values('','$name','$fname','$dateofbirth','$cnic','$mobile','$address
						','$mservice','$picutre','$membership','$cardno','$validto','$validfrom','$license','$refname','$refcnic','$refmobile','$service','$refaddress','$fee','$payments','$education','$criminal','$emploment','$no_weapons','$t_weapon','$s_experience','$weapon')") or die(mysql_error());	
						
						$mid=mysql_insert_id();
						mysql_query("insert into `emergency_details` values ('','$ename','$ecnic','$emobile','$eservice','$eaddress','$mid')") or die(mysql_error());;
						
						// insertion into nominated  guests
						
						mysql_query("insert into `nominated_guests` values ('','$gname1','$gcnic1','$gmobile1','$gaddress1','$gname2','$gcnic2','$gmobile2','$gaddress2','$gname3','$gcnic3','$gmobile3','$gaddress3','$mid')") or die(mysql_error());
					}
						
						header("Location:index.php?page=membership&msg=Record Insert Successfully");
				}
					

?>

<div align="center" style="color:#000;font-size:14px;"><strong>Membership Form</strong></div>


<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" style="color:#000;font-size:16px;margin-top:20px;">
  <table width="1114" border="1" align="center">
    <tr align="center">
      <th width="166" height="47" scope="row">Name</th>
      <td width="339"><input type="text" name="name" id="name" /></td>
      <td width="162"><strong>Father Name</strong></td>
      <td width="419"><input type="text" name="fname" id="fname" /></td>
    </tr>
    <tr align="center">
      <th width="166" height="47" scope="row">CNIC</th>
      <td width="339"><input type="text" name="cnic" id="cnic" /></td>
      <td width="162"><strong>Date of Birth</strong></td>
      <td width="419"><input type="date" name="datebirth" id="datebirth" /></td>
    </tr>
    <tr align="center">
      <th height="56" scope="row">Mobile</th>
      <td><input type="text" name="mobile" id="mobile" /></td>
      <td><strong>Address</strong></td>
      <td><label for="textarea"></label>
      <textarea name="address" id="textarea" cols="45" rows="5"></textarea></td>
    </tr>
    <tr align="center">
      <th height="52" scope="row">UPLOAD Picutre </th>
      <td align="center"><input type="file" name="picture" id="picture" /></td>
      <td><strong>MemberShip </strong></td>
      <td><select name="membership" id="membership">
      <option selected="selected" value="">--SELECT MEMEBERSHIPS---</option>
      <option value="Silver">---SILVER---</option>
      <option value="Gold">---GOLD---</option>
      <option value="Platinum">---PLATINIUM---</option>
     </select></td>
    </tr>
    <tr align="center">
      <th height="61" scope="row"><strong>Card NO</strong></th>
      <td><input type="text" name="cardno" id="cardno" /></td>
      <td><strong>License No</strong></td>
      <td><input type="text" name="licenseno" id="licenseno"/></td>
    </tr>
    <tr align="center">
      <th height="36" scope="row"><strong>Valide From</strong></th>
      <td><input type="date" name="validto" id="validto" /></td>
      <td><strong>Valid To</strong></td>
      <td><input type="date" name="validfrom" id="validfrom"/></td>
    </tr>
     <tr align="center">
      <th height="36" scope="row"><strong>Fee Schedule</strong></th>
      <td><select name="fee" id="fee">
      <option selected="selected" value="">---Fee Schedule---</option>
      <option value="membership">Membership</option>
      <option value="monlty">Monthly</option>
      <option value="yearly">Yearly</option>
      </select></td>
      <td><strong>Payments</strong></td>
      <td><input type="text" name="payments" id="payments" /></td>
    </tr>
    <tr align="center">
      <th height="37" scope="row"><strong>Service/ Business</strong></th>
      <td><input type="text" name="mservice" id="mservice" /></td>
      <td nowrap="nowrap"><strong>Education Qualification</strong></td>
      <td><input type="text" name="qualification" id="qualification" /></td>
    </tr>
     <tr align="center">
      <th height="37" scope="row"><strong>Current Employment</strong></th>
      <td><input type="text" name="employment" id="employment" /></td>
      <td><strong>NO of Weapon</strong></td>
      <td><input type="text" name="noweapon" id="noweapon" /></td>
    </tr>
     <tr align="center">
      <th height="37" scope="row"><strong>Type of Weapon</strong></th>
      <td><textarea name="t_weapon" id="t_weapon" cols="45" rows="5"></textarea></td>
      <td><strong>Any Conviction</strong></td>
      <td><input type="text" name="criminal" id="criminal" /></td>
    </tr>
     <tr align="center">
      <th height="37" scope="row"><strong>Shooting Experience</strong></th>
      <td><input type="text" name="s_experience" id="s_experience" /></td>
      <td><strong>Weapon Name/NO</strong></td>
      <td><input type="text" name="weapon" id="weapon" /></td>
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
      <td height="37"><input type="text" name="ename" id="ename" /></td>
      <td><input type="text" name="ecnic" id="ecnic"/></td>
      <td><input type="text" name="emobile" id="emobile"/></td>
      <td><input type="text" name="eservice" id="eservice"/></td>
      <td><textarea name="eaddress" id="eaddress" cols="45" rows="5"></textarea></td>
    </tr>
  </table>
  <p style="text-align:center;font-weight:bold;margin-top:10px;color:#F00" > REFERENCE CONTACT DETAILS</p>
  <table width="805" border="1" align="center" style="color:#000;font-size:16px">
    <tr>
      <th width="129" height="35" scope="col" nowrap="nowrap">Reference Name</th>
      <th width="156" scope="col">CNIC</th>
      <th width="176" scope="col">Mobile</th>
      <th width="186" scope="col">Service/Business</th>
      <th width="124" scope="col">Address</th>
    </tr>
    <tr>
      <td height="87"><input type="text" name="refname" id="refname"></td>
      <td><input type="text" name="refcnic" id="refcnic"/></td>
      <td><input type="text" name="refmobile" id="refmobile"/></td>
      <td><input type="text" name="service" id="service"/></td>
      <td><label for="refaddress"></label>
      <textarea name="refaddress" id="refaddress" cols="45" rows="5"></textarea></td>
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
      <td height="87"><input type="text" name="gname1" id="gname1" /></td>
      <td><input type="text" name="gcnic1" id="gcnic1"/></td>
      <td><input type="text" name="gmobile1" id="gmobile1"/></td>
      <td><label for="gaddress1"></label>
      <textarea name="gaddress1" id="gaddress1" cols="45" rows="5"></textarea></td>
    </tr>
    <tr align="center">
      <td height="87"><input type="text" name="gname2" id="gname2" /></td>
      <td><input type="text" name="gcnic2" id="gcnic2"/></td>
      <td><input type="text" name="gmobile2" id="gmobile2"/></td>
      <td><label for="gaddress1"></label>
      <textarea name="gaddress2" id="gaddress2" cols="45" rows="5"></textarea></td>
    </tr>
    <tr align="center">
      <td height="87"><input type="text" name="gname3" id="gname3" /></td>
      <td><input type="text" name="gcnic3" id="gcnic3"/></td>
      <td><input type="text" name="gmobile3" id="gmobile3"/></td>
      <td><label for="gaddress1"></label>
      <textarea name="gaddress3" id="gaddress3" cols="45" rows="5"></textarea></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div align="center" style="margin-top:10px;"><input type="submit" name="submit" class="btn btn-large btn-primary" value="SAVE"></div>
</form>

