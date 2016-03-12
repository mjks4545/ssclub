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
<div class="main">
    <h1 style="width: 385px;">Membership Form</h1>
</div>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" >

<table class="responstable">
  
  <tr>
    <td>Name : </td>
    <td data-th="Driver details"><input type="text" name="name" id="name" /></td>
    <td>Father Name :</td>
    <td><input type="text" name="fname" id="fname" /></td>
  </tr>
  
  <tr>
    <td>CNIC :</td>
    <td><input type="text" name="cnic" id="cnic" /></td>
    <td>Date Of Birth :</td>
    <td><input type="date" name="datebirth" id="datebirth" /></td>
  </tr>
  
  <tr>
    <td>Mobile :</td>
    <td><input type="text" name="mobile" id="mobile" /></td>
    <td>Address :</td>
    <td><textarea name="address" id="textarea" rows="5"></textarea></td>
  </tr>
  
  <tr>
    <td>UPLOAD Picutre :</td>
    <td><input type="file" name="picture" id="picture" /></td>
    <td>MemberShip :</td>
    <td>
        <select name="membership" id="membership">
            <option selected="selected" value="">--SELECT MEMEBERSHIPS---</option>
            <option value="Silver">---SILVER---</option>
            <option value="Gold">---GOLD---</option>
            <option value="Platinum">---PLATINIUM---</option>
        </select>
    </td>
  </tr>
  
  <tr>
    <td>Card No :</td>
    <td><input type="text" name="cardno" id="cardno" /></td>
    <td>
        License No :
    </td>
    <td><input type="text" name="licenseno" id="licenseno"/></td>
  </tr>
  <tr>
    <td>Valide From :</td>
    <td><input type="date" name="validto" id="validto" /></td>
    <td>Valid To :</td>
    <td><input type="date" name="validfrom" id="validfrom"/></td>
  </tr>

  <tr>
    <td>Fee Schedule :</td>
    <td>
        <select name="fee" id="fee">
            <option selected="selected" value="">---Fee Schedule---</option>
            <option value="membership">Membership</option>
            <option value="monlty">Monthly</option>
            <option value="yearly">Yearly</option>
        </select>
    </td>
    <td>Payments :</td>
    <td><input type="text" name="payments" id="payments" /></td>
  </tr>
 
  <tr>
    <td>Service / Business :</td>
    <td><input type="text" name="mservice" id="mservice" /></td>
    <td>Education Qualification :</td>
    <td><input type="text" name="qualification" id="qualification" /></td>
  </tr>

  <tr>
    <td>Current Employment :</td>
      <td><input type="text" name="employment" id="employment" /></td>
      <td>NO of Weapon :</td>
      <td><input type="text" name="noweapon" id="noweapon" /></td>
  </tr>
  <tr>
      <td>Type of Weapon :</td>
      <td><textarea name="t_weapon" id="t_weapon" rows="5"></textarea></td>
      <td>Any Conviction :</td>
      <td><input type="text" name="criminal" id="criminal" /></td>
  </tr>
  <tr>
      <td>Shooting Experience :</td>
      <td><input type="text" name="s_experience" id="s_experience" /></td>
      <td>Weapon Name / NO :</td>
      <td><input type="text" name="weapon" id="weapon" /></td>
    </tr>
</table>
    
    <div class="main">
        <h3>IN CASE OF EMERGENCY CONTACT DETAILS</h3>
    </div>
<table class="responstable">
  
  <tr>
    <th>Name :</th>
    <th>CNIC :</th>
    <th>Mobile :</th>
    <th>Service / Business :</th>
    <th>Address :</th>
  </tr>
  
  <tr>
      <td><input style="width: 191px;" type="text" name="ename" id="ename" /></td>
      <td><input style="width: 191px;" type="text" name="ecnic" id="ecnic"/></td>
      <td><input style="width: 191px;" type="text" name="emobile" id="emobile"/></td>
      <td><input style="width: 253px;" type="text" name="eservice" id="eservice"/></td>
      <td><textarea style="width: 191px;" name="eaddress" id="eaddress" rows="5"></textarea></td>
  </tr>
  
</table>
    <div class="main">
        <h3>REFERENCE CONTACT DETAILS</h3>
    </div>
<table class="responstable">
  
  <tr>
    <th>Reference Name :</th>
    <th>CNIC :</th>
    <th>Mobile :</th>
    <th>Service / Business :</th>
    <th>Address :</th>
  </tr>
  
  <tr>
      <td><input type="text" name="refname" id="refname"></td>
      <td><input style="width: 182px;" type="text" name="refcnic" id="refcnic"/></td>
      <td><input style="width: 182px;" type="text" name="refmobile" id="refmobile"/></td>
      <td><input type="text" name="service" id="service"/></td>
      <td><textarea style="width: 182px;" name="refaddress" id="refaddress" rows="5"></textarea></td>
    </tr>
  
</table>
<div class="main">
        <h3>Nominated Guests</h3>
</div>
    <table class="responstable">
    <tr>
      <th>Name :</th>
      <th>CNIC :</th>
      <th>Mobile :</th>
      <th>Address :</th>
    </tr>
    <tr>
      <td><input type="text" name="gname1" id="gname1" /></td>
      <td><input type="text" name="gcnic1" id="gcnic1"/></td>
      <td><input type="text" name="gmobile1" id="gmobile1"/></td>
      <td><textarea name="gaddress1" id="gaddress1" rows="5"></textarea></td>
    </tr>
    <tr>
      <td><input type="text" name="gname2" id="gname2" /></td>
      <td><input type="text" name="gcnic2" id="gcnic2"/></td>
      <td><input type="text" name="gmobile2" id="gmobile2"/></td>
      <td><textarea name="gaddress2" id="gaddress2" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td><input type="text" name="gname3" id="gname3" /></td>
      <td><input type="text" name="gcnic3" id="gcnic3"/></td>
      <td><input type="text" name="gmobile3" id="gmobile3"/></td>
      <td><textarea name="gaddress3" id="gaddress3" rows="5"></textarea></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div align="center" style="margin-top:10px;"><input type="submit" name="submit" class="btn btn-large btn-primary" value="SAVE"></div>
</form>


