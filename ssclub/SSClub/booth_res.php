<?php

			$regid="";
			$b_nic="";
			// calcut time current time
			$offset = 5;
    		$timestamp = time() + ( $offset * 60 * 60 );
     		$time=gmstrftime("%b %d %Y %H:%M:%S", $timestamp) . "\n";
			 $otime=date('h:i A',strtotime($time));	
					
			if(isset($_GET['B_No']))
			{
				$booth_no=$_GET['B_No'];
				
				// query to fetch recor from checkin
				$query=mysql_query("select * from `checkin` where `BoothNo`='$booth_no' ORDER BY `Reg_NO` DESC") or die();
				$row=mysql_fetch_array($query);
				$regid=$row['Reg_NO'];
				$b_nic=$row['NIC'];
				
				
				// query to fetch record form persondetails
				$query1=mysql_query("select * from `persondetails`  where `Reg_NO`='$regid'") or die(mysql_error());
				$row1=mysql_fetch_array($query1);
				
				// query to fetch record from person details2
				 $query2=mysql_query("select * from `persondetails2` where `Reg_No`='$regid'") or die();
				 $row2=mysql_fetch_array($query2);	
			
				// update records on click save button
				if(!empty($_POST['submit']))
				{
				// feilds listed here for checkin table
				$name=ltrim($_POST['name']);
				$fname=$_POST['fname'];
				$license=$_POST['license'];
				$mobile=$_POST['mobile'];
				$idcard=ltrim($_POST['idcard']);
				// check membership
				$member=$Membership;
				$address=$_POST['address'];
				$weapon=$_POST['weapon'];
				$weaponname=$_POST['weaponname'];
				$cardno=ltrim($_POST['cardno']);
				$fire=$_POST['fire'];
				$profession=$_POST['profession'];
				$boothno=ltrim($_POST['boothno']);
				$persons=ltrim($_POST['persons']);
				$charges=ltrim($_POST['charges']);
				$remarks=$_POST['remarks'];
				
				// fields listed here for persondetail_1
				$p_name=$_POST['pname'];
				$p_cell=$_POST['pcell'];
				$pnic=$_POST['pnic'];
				$p_address=$_POST['paddress'];
				
				// fields listed here for persondetails_2
				$p_name2=$_POST['pname2'];
				$p_cell2=$_POST['pcell2'];
				$pnic2=$_POST['pnic2'];
				$p_address2=$_POST['paddress2'];
				
				mysql_query("update `checkin` set `Name`='$name',`fname`='$fname',`LicenseNO`='$license',`Profession`='$profession',`NIC`='$idcard',`CardNo`='$cardno',`TelephoneNo`='$mobile',`Address`='$address',`Weapon`='$weapon',`WeaponName`='$weaponname',`Fire`='$fire',`BoothNo`='$boothno',`Persons`='$persons',`RangeCharge`='$charges',`Remarks`='$remarks' where `Reg_NO`='$regid'") or die();
				
				if($p_name!="")
				{
				// update into persondetails 1
				mysql_query("UPDATE `persondetails` SET `pname`='$p_name',`pcell`='$p_cell',`pnic`='$pnic',`paddress`='$p_address' WHERE `Reg_NO`='$regid'") or die();	
				}
				if($p_name2!="")
				{
				// update into persondetails 2
				mysql_query("UPDATE `persondetails2` SET `pname2`='$p_name2',`pnic2`='$pnic2',`pcell2`='$p_cell2',`paddress2`='$p_address2' WHERE `Reg_No`='$regid'") or die();		
				}
				
				header("Location:index.php?page=booth_res&B_No=$booth_no");
				}
				
				// update and checkout record on checkout button
				if(!empty($_POST['checkout']))
				{
					$atime=$_POST['outtime'];
					// query for check out
					mysql_query("update `checkin` set `TimeOut`='$atime' where `Reg_NO`='$regid'") or die();
					header("Location:index.php?page=searchid");
				}
				// generate bill click on generate button
				if(!empty($_POST['Generate_Bill']))
				{
					//$atime=$_POST['outtime'];
					// query for check out and go to bill page
					//mysql_query("update `checkin` set `TimeOut`='$atime' where `Reg_NO`='$regid'") or die();
					header("Location:store.php?page=checkinsales&reg_id=$regid");
				}
				} // end of get variable if condition
				
?>
<div align="center" style="font-weight:bolder;color:#000;margin-top:0px;"><h4>Booth Record</h4></div>
<div align="center" style="color:#000;margin:20px;"> <strong>Reg NO:&nbsp&nbsp <?php echo $regid;?></div>
<div align="center" style="color:#000">
<form id="form1" name="form1" method="post" action="">
  <table width="997" height="346" border="1" align="center" style="border:#666 1px solid">
    <tr align="center">
      <td width="122" height="38"><strong>Name:</strong></td>
      <td width="331"><input type="text" name="name" id="name" value="<?php if(isset($_GET['B_No'])){ echo $row['Name'];}?>"/></td>
      <td height="38" nowrap="nowrap"><strong>Father Name</strong></td>
      <td height="38"><input type="text" name="fname" id="fname" value="<?php if(isset($_GET['B_No'])){ echo $row['fname'];}?>"/></td>
    </tr>
    <tr align="center">
      <td height="50"><strong>License NO</strong></td>
      <td height="50"><input type="text" name="license" id="license" value="<?php if(isset($_GET['B_No'])){ echo $row['LicenseNO'];}?>"/></td>
      <td width="158" nowrap="nowrap"><strong>Mobile NO</strong></td>
      <td width="358"><input type="text" name="mobile" id="mobile" value="<?php if(isset($_GET['B_No'])){echo $row['TelephoneNo'];}?>"/></td>
    </tr>
    <tr align="center">
      <td height="51" nowrap="nowrap" ><strong>NIC NO:</strong></td>
      <td height="51" nowrap="nowrap" ><input type="text" name="idcard" id="idcard" value="<?php if(isset($_GET['B_No'])){ echo $row['NIC'];}?>"/></td>
      <td><strong>Arrival Time:</strong></td>
      <td height="51" nowrap="nowrap" ><input type="text" readonly="readonly" name="atime" id="atime" value="<?php if(isset($_GET['B_No'])){echo $row['ArrivalTime'];}?>" /></td>
    </tr>
    <tr align="center">
      <td><strong>Membership</strong></td>
      <?php
      	if(isset($_GET['B_No']))
		{
		$Nic=$row['NIC'];
      	$query5=mysql_query("select * from `checkin` where `NIC`='$Nic' ORDER BY `Reg_NO` DESC") or die();
		$row5=mysql_fetch_array($query5);
		}
	  ?>
      <td style="font-size:36px;font-weight:bold;font-family:'MS Serif', 'New York', serif"><?php if(isset($_GET['B_No'])){ echo $row5['Membership'];}?></td>
      <td nowrap="nowrap"><strong>Address :</strong></td>
      <td><textarea name="address" id="address" cols="50" rows="5" style="width:400px;"><?php if(isset($_GET['B_No'])){ echo $row['Address'];}?>
      </textarea></td>
    </tr>
    <tr align="center">
      <td nowrap="nowrap"><strong>Upload Picture:</strong></td>
      <td nowrap="nowrap">
      <?php
	  	if(isset($_GET['B_No']))
		{
		$Nic=$row['NIC'];
      	$query3=mysql_query("select * from `checkin` where `NIC`='$Nic' ORDER BY `Reg_NO` ASC") or die();
		$row3=mysql_fetch_array($query3);
		}
	  ?>
     <?php if(isset($_GET['B_No'])){?><img src="picture/<?php echo $row3['Picture'];?>" alt="" width="100" height="100" /><?php }?>
     </td>
      <td><strong>Weapon:</strong></td>
      <td><label class="radio">
        <input type="radio" name="weapon" value="self" <?php if(isset($_GET['B_No']) && $row['Weapon']=="self"){ echo 'checked="checked"';}?>/> 
        Self </label>
        <label class="radio">
          <input type="radio" name="weapon" value="club" <?php if(isset($_GET['B_No']) && $row['Weapon']=="club"){ echo 'checked="checked"';}?>/>
          Club </label></td>
    </tr>
    <tr align="center">
      <td nowrap="nowrap"><strong>Weapon Name/No</strong></td>
      <td nowrap="nowrap"><input type="text" name="weaponname" id="weaponname" value="<?php if(isset($_GET['B_No'])){ echo $row['WeaponName'];}?>"/></td>
      <td nowrap="nowrap"><strong>Card No</strong></td>
      <td nowrap="nowrap"><input type="text" name="cardno" id="cardno" value="<?php if(isset($_GET['B_No'])){ echo $row['CardNo'];}?>"/></td>
    </tr>
    <tr align="center">
      <td nowrap="nowrap"><strong>No of Fire</strong></td>
      <td nowrap="nowrap"><input type="text" name="fire" id="fire" value="<?php if(isset($_GET['B_No'])){ echo $row['Fire'];}?>" /></td>
      <td nowrap="nowrap"><strong>Profession:</strong></td>
      <td nowrap="nowrap"><input type="text" name="profession" id="profession" class="input-large" value="<?php if(isset($_GET['B_No'])){ echo $row['Profession'];}?>"/></td>
    </tr>
  </table>
<div></div> 
  <table width="994" height="73" border="1">
    <tr>
      <th width="182" height="34" nowrap="nowrap" scope="col"><stong>Booth No:</stong></th>
      <th width="258" scope="col"><strong>No of Persons</strong></th>
      <th width="266" nowrap="nowrap" scope="col"><strong>Range Charge</strong></th>
      <th width="260" scope="col"><strong>Remarks</strong></th>
    </tr>
    <tr>
      <td><input type="text" name="boothno" value="<?php if(isset($_GET['B_No'])){ echo $row['BoothNo'];}?>" /></td>
      <td><input type="text" name="persons" id="noofperson" value="<?php if(isset($_GET['B_No'])){ echo $row['Persons'];}?>" onkeyup="showTable();"/></td>
      <td><input type="text" name="charges" id="charges" value="<?php if(isset($_GET['B_No'])){ echo $row['RangeCharge'];}?>"/></td>
      <td><input type="text" name="remarks" id="remarks" value="<?php if(isset($_GET['B_No'])){ echo $row['Remarks'];}?>"/></td>
    </tr>
  </table>
  <?php
  		$query4=mysql_query("select * from `persondetails` where `Reg_NO`='$regid'") or die();
		$num=mysql_num_rows($query4);
		$row4=mysql_fetch_array($query4);
		$person=$row['Persons'];
		if($person>1)
		{
  ?>
  <div align="center">
    <table width="900" border="1" cellpadding="5" id="table">
      <tr align="center">
        <td width="256"><strong>Name</strong></td>
        <td width="300"><strong>Cell No</strong></td>
         <td width="300"><strong>NIC No</strong></td>
        <td width="298"><strong>Address</strong></td>
      </tr>
      <tr align="center">
        <td><input type="text" name="pname" value="<?php if(isset($_GET['B_No'])){ echo $row1['pname'];}?>" /></td>
        <td width="300"><input type="text" name="pcell" id="pcell" value="<?php if(isset($_GET['B_No'])){ echo $row1['pcell'];}?>" /></td>
        <td width="317"><input type="text" name="pnic" id="nic" value="<?php if(isset($_GET['B_No'])){ echo $row1['pnic'];}?>"></td>
        <td width="298"><input type="text" name="paddress" value="<?php if(isset($_GET['B_No'])){ echo $row1['paddress'];}?>" /></td>
      </tr>
      <tr align="center">
        <td><input type="text" name="pname2" value="<?php if(isset($_GET['B_No'])){ echo $row2['pname2'];}?>"/></td>
        <td width="300"><input type="text" name="pcell2" value="<?php if(isset($_GET['B_No'])){ echo $row2['pcell2'];}?>"/></td>
         <td width="317"><input type="text" name="pnic2" id="nic2" value="<?php if(isset($_GET['B_No'])){ echo $row2['pnic2'];}?>"></td>
        <td width="298"><input type="text" name="paddress2" value="<?php if(isset($_GET['B_No'])){ echo $row2['paddress2'];}?>"/></td>
      </tr>
    </table>
   <?php }?>
  </div>
<div align="center">The guset house and management hold no responsibilty for any loss of valueable assets & cash if not desposited.</div>
 <div align="center" style="padding-top:20px;" id="noPrint">
  <input type="submit" name="submit" class="btn btn-large btn-primary" value="Save" style="margin-left:450px;">
  </form> <!--end of form_1 for save button-->
  
  <!----form for genreate bill button-->
  <div style="float:right;margin-right:360px;">
  <form method="post" action="">
  <input type="submit" name="Generate_Bill" class="btn btn-large btn-primary" value="Generate Bill" style="background-color:#666">
<?php 
  			// bill number recently genreated on today data base
			$date=date('Y-m-d');
			$sql=mysql_query("SELECT sales.Sid,salesbill.sb_id FROM checkin JOIN sales ON checkin.NIC=sales.NIC JOIN salesbill ON sales.Sid=salesbill.s_id where `TimeOut`='' AND `Reg_NO`='$regid' AND `Date`='$date' ORDER BY sales.Sid DESC") or die();
			$run_qry=mysql_fetch_array($sql);
		    $bill_id=$run_qry[1];
			$b_sid=$run_qry[0]; 
?>
 <?php if($bill_id!=0){?> <a href="store.php?page=salebillreport&id=<?php echo $b_sid;?>" class="btn btn-large btn-primary">Bill#:&nbsp <?php echo $bill_id;?></a><?php }?> 
  </form>
   </div>
   <div style="margin-right:20px;float:right"> 
 <!---form_2 for checkout button---->
  <form method="post" action="">
  <input type="hidden" readonly="readonly" name="outtime" id="outtime" value="<?php if(isset($_GET['B_No'])){echo $otime;}?>" />
  <input type="submit" name="checkout" class="btn btn-large btn-primary" value="CheckOut">
  </form>
  </div> 
</div>

