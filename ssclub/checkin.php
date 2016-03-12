<?php
		
		$registration="";
		$regid="";
                $Namecheckin = '';
                               $fnamecheckin = '';
                               $LicenseNOcheckin = '';
                               $Professioncheckin = '';
                               $NICcheckin = '';
                               $CardNocheckin = '';
                               $TelephoneNocheckin = '';
                               $Membershipcheckin = '';
                               $Addresscheckin = '';
                               $TimeOutcheckin = '';
                               $Firecheckin = '';
                               $s_experiencecheckin = '';
                               $Picturecheckin = '';
                               $Weaponcheckin = '';
                               $WeaponNamecheckin = '';
                               $ArrivalDatecheckin = '';
                               $ArrivalTimecheckin = '';
// select all data from checkin table for search query
			if(isset($_GET['nic'])) 
			 {
				$idcard=$_GET['nic'];
				$query=mysql_query("select * from `checkin` where `NIC` = '$idcard' OR `CardNo` = '$idcard'") or die(mysql_error()); // for Nic number Checking 
				while($row=mysql_fetch_array($query)){
                                //print_r($row);
                               $Namecheckin = $row['Name'];
                               $fnamecheckin = $row['fname'];
                               $LicenseNOcheckin = $row['LicenseNO'];
                               $Professioncheckin = $row['Profession'];
                               $NICcheckin = $row['NIC'];
                               $CardNocheckin = $row['CardNo'];
                               $TelephoneNocheckin = $row['TelephoneNo'];
                               $Membershipcheckin = $row['Membership'];
                               $Addresscheckin = $row['Address'];
                               $TimeOutcheckin = $row['TimeOut'];
                               $Firecheckin = $row['Fire'];
                               $s_experiencecheckin = $row['s_experience'];
                               $Picturecheckin = $row['Picture'];
                               $Weaponcheckin = $row['Weapon'];
                               $WeaponNamecheckin = $row['WeaponName'];
                               $ArrivalDatecheckin = $row['ArrivalDate'];
                               $ArrivalTimecheckin = $row['ArrivalTime'];
                               $regid=$row['Reg_NO'];
                               }// die();
                                if(isset($Membershipcheckin))
                                    {
                                    
                                    $member=$Membershipcheckin;
                                    
                                }else{
                                    
                                    $member = "";
                                
                                }
				
                                if(isset($NICcheckin)){$nic=$NICcheckin;}else{$nic='';}
                                if(isset($CardNocheckin)){$card=$CardNocheckin;}else{$card='';}
                                if(isset($Picturecheckin)){$old_pic=$Picturecheckin;}else{$old_pic='';}
					
					
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
                                                        $pname3=ltrim($_POST['pname3']);
							$pcell3=ltrim($_POST['pcell3']);
							$pnic3=ltrim($_POST['pnic3']);
                                                        $paddress3=$_POST['paddress3'];
                                                        //echo $pname3 ." ".$pcell3 ." ".$pnic3." ".$paddress3;
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
								 mysql_query("insert into `persondetails2` values('','$pname2','$pcell2','$pnic2','$paddress2','$registration','$pname3','$pcell3','$pnic3','$paddress3')") or die();	
								}
							}
							
							
							
							header("Location:index.php?page=searchid&msg=Record Insert Successfully");
						}
			
			
			?>
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
         
         if(isset($_GET['nic'])){
             $Cinic = $_GET['nic'];
             $mqry =  mysql_query("SELECT `M_id` FROM `membership` WHERE `Cnic` = $Cinic");
             if(!empty($mqry)){
                $mrow = mysql_fetch_array($mqry);
             //print_r($mrow);
                $mrid = $mrow['M_id'];
                $mqry1 =  mysql_query("SELECT * FROM `nominated_guests` WHERE `M_id` = $mrid");
                if(!empty($mqry1)){
                $mrow1 = mysql_fetch_array($mqry1);}
             }
             //print_r($mrow1);
         }
         
	 ?>
<?php
		
                    // First person Details
                    
                    $qry=mysql_query("select * from `persondetails` where `Reg_NO`='$regid'") or die();
                    $result=mysql_fetch_array($qry);
                    //die();
                     
                    
                           
                    $person=$row['Persons'];
		
                    // second Persons Details
                    $qry1=mysql_query("select * from `persondetails2` where `Reg_NO`='$regid'") or die();
                    $result1=mysql_fetch_array($qry1);
                    //print_r($result1);
		
?>
   
<div class="main">
    
    <h2>CHECK IN</h2><br />
    <h1>Reg NO:<?php  echo $registration;?></h1><?php if($member=="Silver") {?><span style="background:#C0C0C0;padding:10px;"><strong><?php  echo $member;?> </strong> </span> <?php }?> <?php if($member=="Gold"){?><span style="background:#DAA520;padding:10px;"><strong><?php  echo $member;?> </strong> </span> <?php }?> <?php if($member=="Platinum") {?><span style="background:#EDEDEF;padding:10px;"><strong><?php  echo $member;?> </strong></span>&nbsp;&nbsp;&nbsp;&nbsp; <?php }?>
    <h3>Date : <?php echo date('Y-m-d');?></h3>
    
</div>

<form  action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table class="responstable">
  
  <tr>
    <td>Name :</td>
    <td><input type="text" name="name" id="name" value="<?php if(isset($idcard)) {echo $Namecheckin; } ?>" required/></td>
    <td>Father Name :</td>
    <td><input type="text" name="fname" id="fname" value="<?php if(isset($idcard)) {echo $fnamecheckin; } ?>" required="required"/></td>
    
  </tr>
  
  <tr>
    <td>License NO :</td>
    <td><input type="text" name="license" id="license" value="<?php if(isset($idcard)) {echo $LicenseNOcheckin;} ?>" required="required"/></td>
    <td>Card No :</td>
    <td><input type="text" name="cardno" id="cardno" value="<?php if($idcard==$card){ echo $card;}else if($idcard!=$card){echo $card;}?>" required="required"/></td>
    
  </tr>
  
  <tr>
    <td>NIC NO :</td>
    <td><input type="text" name="idcard" id="idcard" value="<?php if($idcard==$nic){echo $nic;}else if($idcard!=$nic && $idcard!=$card){echo $idcard;}else if($idcard==$card){ echo $nic;}?>" required="required"/></td>
    <td>Arrival Time :</td>
    <td><?php  if(isset($id)){ echo $ArrivalTimecheckin;}?></td>
    
  </tr>
  
  <tr>
    <td>MemberShip :</td>
    <td> 
        <?php 
					if($member=="Gold" || $member=="Silver" || $member=="Platinum" || $member=="Walkin")
					{
		
					 //echo "$member";
					 
					 
					}
        ?>
        <select name="membership" id="membership" style="margin-top:20px;" required="required">
            <option selected="selected" value="">--SELECT MEMEBERSHIPS---</option>
            <option <?php if($member == 'Silver') echo 'selected="selected"'; ?> value="Silver">---SILVER---</option>
            <option <?php if($member == 'Gold') echo 'selected="selected"'; ?> value="Gold">---GOLD---</option>
            <option <?php if($member == 'Platinum') echo 'selected="selected"'; ?> value="Platinum">---PLATINIUM---</option>
            <option <?php if($member == 'Walkin') echo 'selected="selected"'; ?> value="Walkin">---WALKIN---</option>
        </select>
    </td>
    <td>Address :</td>
    <td><textarea name="address" id="address" rows="5" style="width:95%;" required="required"><?php if(isset($idcard)){ echo $Addresscheckin;}?>
      </textarea></td>
    
  </tr>
  
  <tr>
    <td>Upload Picture :</td>
    <td><?php if(isset($idcard)){?><img src="picture/<?php echo $Picturecheckin;?>" width="30%" height="100"><?php }?> <?php  if(isset($Picturecheckin)&&$Picturecheckin=='') {?><input type="file" name="picture" id="picture" value="" required/> <?php  }?></td>
    <td>Weapon :</td>
    <td><input class="something123456" type="radio" name="weapon" value="self" checked="checked"> Self <input class="something123456" type="radio" name="weapon" value="club"  <?php if($Weaponcheckin == 'club') echo 'checked="checked"'?>> Club</td>
    
  </tr>
  <tr>
    <td>Weapon Name/NO :</td>
    <td><input type="text" name="weaponname" id="weaponname" value="<?php  if(isset($idcard)){ echo $WeaponNamecheckin;}?>" required="required"/></td>
    <td>Mobile No :</td>
    <td><input type="text" name="phone" id="phone" value="<?php if(isset($idcard)){ echo $TelephoneNocheckin;}?>" required="required"/></td>
    
  </tr>
  <tr>
    <td>No of Fire :</td>
    <td><input type="text" name="fire" id="fire" value="<?php if(isset($idcard)){ echo $Firecheckin;}?>" required="required" /></td>
    <td>Shooting Experience :</td>
    <td><input type="text" name="s_experience" id="s_experience" value="<?php if(isset($idcard)){echo $s_experiencecheckin;}?>" required="required" /></td>
    
  </tr>
  <tr>
    <td>Date :</td>
    <td><?php if(isset($idcard)){ echo $ArrivalDatecheckin;}?></td>
    <td>Profession :</td>
    <td><input type="text" name="profession" id="profession" class="input-large" value="<?php  if(isset($idcard)){ echo $Professioncheckin;}?>" required="required"/></td>
    
  </tr>
  <tr>
      <th>Booth No :</th>
      <th>No of Persons :</th>
      <th>Range Charges :</th>
      <th>Remarks :</th>
  </tr>
  <tr>
      <td><input type="text" name="boothno" id="boothno" value="" required /></td>
      <td><input type="text" name="persons" id="noofperson" value="" onkeyup="showTable();" required /></td>
      <td><input type="text" name="charges" id="charges" value="<?php if(isset($idcard)){ echo $row['RangeCharge'];}?>" required /></td>
      <td><input type="text" name="remarks" id="remarks" value="<?php if(isset($idcard)){echo $row['Remarks'];}?>" /></td>
  </tr>
  <tr>
      <th>Name :</th>
      <th>Cell No :</th>
      <th>NIC :</th>
      <th>Address :</th>
  </tr>
  <tr>
      <td><input class="1" id="1" type="text" name="pname" value="<?php echo $result['pname'];?>"></td>
      <td><input class="1" id="11" type="text" name="pcell" id="pcell" value="<?php echo $result['pcell'];?>"></td>
      <td><input class="1" id="111" type="text" name="pnic" id="nic"  value="<?php echo $result['pnic'];?>"></td>
      <td><input class="1" id="1111" type="text" name="paddress"  value="<?php echo $result['paddress'];?>"><input style="margin-left: 9px;margin-bottom: 11px;border: 1px yellow;" type="button" id="reset" value="R"></td>
      
  </tr>
  <tr>
      <td><input class="2" id="2" type="text" name="pname2" value="<?php echo $result1['pname2'];?>"/></td>
      <td><input class="2" id="22" type="text" name="pcell2" value="<?php echo $result1['pcell2'];?>"/></td>
      <td><input class="2" id="222" type="text" name="pnic2" id="nic2" value="<?php echo $result1['pnic2'];?>"></td>
      <td><input class="2" id="2222" type="text" name="paddress2" value="<?php echo $result1['paddress2'];?>"/><input style="margin-left: 9px;margin-bottom: 11px;border: 1px yellow;" type="button" id="reset1" value="R"></td>
  </tr>
  <tr>
      <td><input class="3" id="3" type="text" name="pname3" value="<?php echo $result1['pname3'];?>"/></td>
      <td><input class="3" id="33" type="text" name="pcell3" value="<?php echo $result1['pcell3'];?>"/></td>
      <td><input class="3" id="333" type="text" name="pnic3" id="nic2" value="<?php echo $result1['pnic3'];?>"></td>
      <td><input class="3" id="3333" type="text" name="paddress3" value="<?php echo $result1['paddress3'];?>"/><input style="margin-left: 9px;margin-bottom: 11px;border: 1px yellow;" type="button" id="reset2" value="R"></td>
  </tr>
  
  
</table>
   <div class="main">
      <h3>NOMINATED GUESTS</h3>
  </div>
    <table class="responstable">
        <tr>
            <th>Name :</th>
            <th>CNIC :</th>
            <th>Mobile :</th>
            <th>Address :</th>
        </tr>
        <tr id="clickme">
            <td id="name1"><?php if(isset($mrow1)) echo $mrow1['name1']; ?></td>
            <td id="cnic1"><?php if(isset($mrow1)) echo $mrow1['cnic1']; ?></td>
            <td id="mobile1"><?php if(isset($mrow1)) echo $mrow1['mobile1']; ?></td>
            <td id="address1"><?php if(isset($mrow1)) echo $mrow1['address1']; ?></td>
        </tr>
        <tr id="clickme1">
            <td id="name2"><?php if(isset($mrow1)) echo $mrow1['name2']; ?></td>
            <td id="cnic2"><?php if(isset($mrow1)) echo $mrow1['cnic2']; ?></td>
            <td id="mobile2"><?php if(isset($mrow1)) echo $mrow1['mobile2']; ?></td>
            <td id="address2"><?php if(isset($mrow1)) echo $mrow1['address2']; ?></td>
        </tr>
        <tr id="clickme2">
            <td id="name3"><?php if(isset($mrow1)) echo $mrow1['name3']; ?></td>
            <td id="cnic3"><?php if(isset($mrow1)) echo $mrow1['cnic3']; ?></td>
            <td id="mobile3"><?php if(isset($mrow1)) echo $mrow1['mobile3']; ?></td>
            <td id="address3"><?php if(isset($mrow1)) echo $mrow1['address3']; ?></td>
        </tr>
    </table>
    <div style="text-align: center;">The guset house and management hold no responsibilty for any loss of valueable assets & cash if not desposited.</div>
<div align="center" style="padding-top:20px; margin: 0px auto;" id="noPrint">
    <input style="border-radius: 10px;" type="submit" name="submit" class="btn btn-large btn-primary" value="Save">
</div>
</form>

<script>
    $('#reset').click(function(){
       $('.1').val(''); 
    });
    $('#reset1').click(function(){
       $('.2').val(''); 
    });
    $('#reset2').click(function(){
       $('.3').val(''); 
    });
    $('#clickme').on("click",function(){
       
        var something1 = $('#name1').html();
        var something11 = $('#cnic1').html();
        var something111 = $('#mobile1').html();
        var something1111 = $('#address1').html();
        
        if($('#1').val() == ''){
            $('#1').val(something1);
            $('#11').val(something11);
            $('#111').val(something111);
            $('#1111').val(something1111);
        }else if( $('#2').val() == '' ){
            
            $('#2').val(something1);
            $('#22').val(something11);
            $('#222').val(something111);
            $('#2222').val(something1111);
            
        }else if($('#3').val() == ''){
            
            $('#3').val(something1);
            $('#33').val(something11);
            $('#333').val(something111);
            $('#3333').val(something1111);
            
        }
    });
    $('#clickme1').on("click",function(){
       var something2 = $('#name2').html();
       var something22 = $('#cnic2').html();
        var something222 = $('#mobile2').html();
        var something2222 = $('#address2').html();
        if($('#1').val() == ''){
            $('#1').val(something2);
            $('#11').val(something22);
            $('#111').val(something222);
            $('#1111').val(something2222);
        }else if( $('#2').val() == '' ){
            
            $('#2').val(something2);
            $('#22').val(something22);
            $('#222').val(something222);
            $('#2222').val(something2222);
            
        }else if($('#3').val() == ''){
            
            $('#3').val(something2);
            $('#33').val(something22);
            $('#333').val(something222);
            $('#3333').val(something2222);
            
        }
    });
    $('#clickme2').on("click",function(){
       var something3 = $('#name3').html();
       var something33 = $('#cnic3').html();
        var something333 = $('#mobile3').html();
        var something3333 = $('#address3').html();
        if($('#1').val() == ''){
            $('#1').val(something3);
            $('#11').val(something33);
            $('#111').val(something333);
            $('#1111').val(something3333);
        }else if( $('#2').val() == '' ){
            
            $('#2').val(something3);
            $('#22').val(something33);
            $('#222').val(something333);
            $('#2222').val(something3333);
            
        }else if($('#3').val() == ''){
            
            $('#3').val(something3);
            $('#33').val(something33);
            $('#333').val(something333);
            $('#3333').val(something3333);
            
        }
    });
</script>


