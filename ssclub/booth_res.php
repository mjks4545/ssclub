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
				//echo $regid;
				
				// query to fetch record form persondetails
				$query1=mysql_query("SELECT * 
FROM  `persondetails` 
WHERE  `Reg_NO` =  '$regid'");
				$row1=mysql_fetch_array($query1);
				
				
				// query to fetch record from person details2
				 $query2=mysql_query("select * from `persondetails2` where `Reg_No`='$regid'") or die();
				 $row2=mysql_fetch_array($query2);	
			
				// update records on click save button
				if(!empty($_POST['submit']))
				{
				// feilds listed here for checkin table
				$name=ltrim($_POST['name']);
                                //echo $name;die();
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
				
				$p_name3=$_POST['pname3'];
				$p_cell3=$_POST['pcell3'];
				$pnic3=$_POST['pnic3'];
				$p_address3=$_POST['paddress3'];
				
				mysql_query("update `checkin` set `Name`='$name',`fname`='$fname',`LicenseNO`='$license',`Profession`='$profession',`NIC`='$idcard',`CardNo`='$cardno',`TelephoneNo`='$mobile',`Address`='$address',`Weapon`='$weapon',`WeaponName`='$weaponname',`Fire`='$fire',`BoothNo`='$boothno',`Persons`='$persons',`RangeCharge`='$charges',`Remarks`='$remarks' where `Reg_NO`='$regid'") or die();
				
				if($p_name!="")
				{
				// update into persondetails 1
				mysql_query("UPDATE `persondetails` SET `pname`='$p_name',`pcell`='$p_cell',`pnic`='$pnic',`paddress`='$p_address' WHERE `Reg_NO`='$regid'") or die();	
				}
				if($p_name2!="")
				{
				// update into persondetails 2
				mysql_query("UPDATE `persondetails2` SET `pname2`='$p_name2',`pnic2`='$pnic2',`pcell2`='$p_cell2',`paddress2`='$p_address2',`pname3`='$p_name3',`pnic3`='$pnic3',`pcell3`='$p_cell3',`paddress3`='$p_address3' WHERE `Reg_No`='$regid'") or die();		
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
				$idcard=ltrim($_POST['idcard']);	
                                    header("Location:store.php?page=checkinsales&reg_id=$regid&sname=$name");
				}
				} // end of get variable if condition
				
?>
<?php
                if( isset($_POST['submit'])|| !isset($_POST['submit']) ){
                    //echo $regid; 
                    $query4=mysql_query("select * from `persondetails` where `Reg_NO`='$regid'") or die();
                    
                    $num=mysql_num_rows($query4);
                    
                    $row4=mysql_fetch_array($query4);
                    //if($row4){echo 'fine';}
                    $person=$row['Persons'];
                    //print_r($row4);
                }
        if(isset($_GET['B_No'])){
             $Cinic = $row['NIC'];
             //echo $Cinic;
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

<div class="main">
    
    <h2>Booth Record</h2><br />
    <h1>Reg NO:<?php echo $regid;?></h1>
    <h3>Date : <?php echo date('Y-m-d');?></h3>
    
</div>

<form id="form1" name="form1" method="post" action="">
<table class="responstable">
  
  <tr>
    <td>Name :</td>
    <td><input type="text" name="name" id="name" value="<?php if(isset($_GET['B_No'])){ echo $row['Name'];}?>" required="required" /></td>
    <td>Father Name :</td>
    <td><input type="text" name="fname" id="fname" value="<?php if(isset($_GET['B_No'])){ echo $row['fname'];}?>" required="required" /></td>
    
  </tr>
  
  <tr>
    <td>License NO :</td>
    <td><input type="text" name="license" id="license" value="<?php if(isset($_GET['B_No'])){ echo $row['LicenseNO'];}?>" required="required"/></td>
    <td>Card No :</td>
    <td><input type="text" name="cardno" id="cardno" value="<?php if(isset($_GET['B_No'])){ echo $row['CardNo'];}?>" required="required" /></td>
    
  </tr>
  
  <tr>
    <td>NIC NO :</td>
    <td><input type="text" name="idcard" id="idcard" value="<?php if(isset($_GET['B_No'])){ echo $row['NIC'];}?>" required="required" /></td>
    <td>Arrival Time :</td>
    <td><input type="text" readonly="readonly" name="atime" id="atime" value="<?php if(isset($_GET['B_No'])){echo $row['ArrivalTime'];}?>" /></td>
    
  </tr>
  
  <tr>
    <td>MemberShip :</td>
    <td> 
        <?php
                if(isset($_GET['B_No']))
		{
                    $Nic=$row['NIC'];
                    $query5=mysql_query("select * from `checkin` where `NIC`='$Nic' ORDER BY `Reg_NO` DESC") or die();
                    $row5=mysql_fetch_array($query5);
		}
	?>
        <?php if(isset($_GET['B_No'])){ echo $row5['Membership'];}?>
    </td>
    <td>Address :</td>
    <td><textarea name="address" id="address" rows="5" style="width:95%;"><?php if(isset($_GET['B_No'])){ echo $row['Address'];}?>
      </textarea></td>
    
  </tr>
  
  <tr>
    <td>Upload Picture :</td>
    <td>
        <?php
	  	if(isset($_GET['B_No']))
		{
                    $Nic=$row['NIC'];
                    $query3=mysql_query("select * from `checkin` where `NIC`='$Nic' ORDER BY `Reg_NO` ASC") or die();
                    $row3=mysql_fetch_array($query3);
		}
                
	  ?>
        <?php if(isset($_GET['B_No'])){?><img src="picture/<?php echo $row3['Picture'];?>" alt="" width="30%" height="100" /><?php }?>
    <td>Weapon :</td>
    <td><input type="radio" name="weapon" value="self" <?php if(isset($_GET['B_No']) && $row['Weapon']=="self"){ echo 'checked="checked"';}?>/> Self <input type="radio" name="weapon" value="club" <?php if(isset($_GET['B_No']) && $row['Weapon']=="club"){ echo 'checked="checked"';}?>/> Club</td>
    
  </tr>
  <tr>
    <td>Weapon Name/NO :</td>
    <td><input type="text" name="weaponname" id="weaponname" value="<?php if(isset($_GET['B_No'])){ echo $row['WeaponName'];}?>" required="required"/></td>
    <td>Mobile No :</td>
    <td><input type="text" name="mobile" id="mobile" value="<?php if(isset($_GET['B_No'])){echo $row['TelephoneNo'];}?>" required="required"/></td>
    
  </tr>
  <tr>
    <td>No of Fire :</td>
    <td><input type="text" name="fire" id="fire" value="<?php if(isset($_GET['B_No'])){ echo $row['Fire'];}?>" required="required" /></td>
    <td>Shooting Experience :</td>
    <td><input type="text" name="s_experience" id="s_experience" value="<?php if(isset($_GET['B_No'])){echo $row['s_experience'];}?>" /></td>
    
  </tr>
  <tr>
    <td>Date :</td>
    <td><?php if(isset($idcard)){ echo $row['ArrivalDate'];}?></td>
    <td>Profession :</td>
    <td><input type="text" name="profession" id="profession" value="<?php if(isset($_GET['B_No'])){ echo $row['Profession'];}?>" required="required"/></td>
    
  </tr>
  <tr>
      <th>Booth No :</th>
      <th>No of Persons :</th>
      <th>Range Charges :</th>
      <th>Remarks :</th>
  </tr>
  <tr>
      <td><input type="text" name="boothno" value="<?php if(isset($_GET['B_No'])){ echo $row['BoothNo'];}?>" /></td>
      <td><input type="text" name="persons" id="noofperson" value="<?php if(isset($_GET['B_No'])){ echo $row['Persons'];}?>" onkeyup="showTable();"/></td>
      <td><input type="text" name="charges" id="charges" value="<?php if(isset($_GET['B_No'])){ echo $row['RangeCharge'];}?>"/></td>
      <td><input type="text" name="remarks" id="remarks" value="<?php if(isset($_GET['B_No'])){ echo $row['Remarks'];}?>"/></td>
  </tr>
  <tr>
      <th>Name :</th>
      <th>Cell No :</th>
      <th>NIC :</th>
      <th>Address :</th>
  </tr>
  <tr>
      <td><input class="1" id="1" type="text" name="pname" value="<?php if(isset($_GET['B_No'])){ echo $row4['pname'];}?>" /></td>
        <td><input class="1" id="11" type="text" name="pcell" id="pcell" value="<?php if(isset($_GET['B_No'])){ echo $row4['pcell'];}?>" /></td>
        <td><input class="1" id="111" type="text" name="pnic" id="nic" value="<?php if(isset($_GET['B_No'])){ echo $row4['pnic'];}?>"></td>
        <td><input class="1" id="1111" type="text" name="paddress" value="<?php if(isset($_GET['B_No'])){ echo $row4['paddress'];}?>" /><input style="margin-left: 9px;margin-bottom: 11px;border: 1px yellow;" type="button" id="reset" value="R"></td>
 </tr>
 <tr align="center">
        <td><input class="2" id="2" type="text" name="pname2" value="<?php if(isset($_GET['B_No'])) echo $row2['pname2'];?>"/></td>
        <td><input class="2" id="22" type="text" name="pcell2" value="<?php if(isset($_GET['B_No'])) echo $row2['pcell2'];?>"/></td>
        <td><input class="2" id="222" type="text" name="pnic2" id="nic2" value="<?php if(isset($_GET['B_No'])) echo $row2['pnic2'];?>"></td>
        <td><input class="2" id="2222" type="text" name="paddress2" value="<?php if(isset($_GET['B_No'])) echo $row2['paddress2'];?>"/><input style="margin-left: 9px;margin-bottom: 11px;border: 1px yellow;" type="button" id="reset1" value="R"></td>
 </tr>
 <tr align="center">
        <td><input class="3" id="3" type="text" name="pname3" value="<?php if(isset($_GET['B_No'])) echo $row2['pname3'];?>"/></td>
        <td><input class="3" id="33" type="text" name="pcell3" value="<?php if(isset($_GET['B_No'])) echo $row2['pcell3'];?>"/></td>
        <td><input class="3" id="333" type="text" name="pnic3" id="nic2" value="<?php if(isset($_GET['B_No'])) echo $row2['pnic3'];?>"></td>
        <td><input class="3" id="3333" type="text" name="paddress3" value="<?php if(isset($_GET['B_No'])) echo $row2['paddress3'];?>"/><input style="margin-left: 9px;margin-bottom: 11px;border: 1px yellow;" type="button" id="reset2" value="R"></td>
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
    <div align="center" style="padding-top:20px;" id="noPrint">
  <input type="submit" name="submit" class="btn btn-large btn-primary" value="Save" style="margin-left:222px;border-radius: 10px;">
  </form> <!--end of form_1 for save button-->
  
  <!----form for genreate bill button-->
  <div style="float:right;margin-right:360px;">
  <form method="post" action="">
     <?php
      if($_SESSION['Role']!="opertor" && $_SESSION['Role']!="admin2"){
          ?>
      <input style="margin-right: 50px;border-radius: 10px;" type="submit" name="Generate_Bill" class="btn btn-large btn-primary" value="Generate Bill" style="background-color:#666">
<?php  

}
?>
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
  <input style="margin-right: 100px;border-radius: 10px;" type="submit" name="checkout" class="btn btn-large btn-primary" value="CheckOut">
  </form>
  </div> 
</div>
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