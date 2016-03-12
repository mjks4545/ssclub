<?php      
			error_reporting(0);
			
			if($_GET['nic'] ||  $_GET['card'] || $_GET['booth'] || $_GET['name'] || $_GET['weaponname'] || $_GET['from'] || $_GET['weapon'] || $_GET['to'] ||  $_GET['fire'] || $_GET['membership'] || $_GET['regno'] || $_GET['guestnic'])
			{
				
				 $nic=$_GET['nic'];
				 $regno=$_GET['regno'];
				 $card=$_GET['card'];
				 $booth=$_GET['booth'];
				 $name=$_GET['name'];
				 $weaponname=$_GET['weaponname'];
				 $from=$_GET['from'];
				 $weapon=$_GET['weapon'];
				$to=$_GET['to'];
				$fire=$_GET['fire'];
				//$billno=$_GET['billno'];
				$memberhsip=$_GET['membership'];
				$guestnic=$_GET['guestnic'];
				
				if($guestnic)
				{
					$qry45=mysql_query("select * from `persondetails` where `pnic`='$guestnic'") or die();
					$result=mysql_fetch_array($qry45);
					$reg_no=$result['Reg_NO'];
					$num=mysql_num_rows($qry45);
					if($num==1)
					{
					$query=mysql_query("select * from `checkin` where `Reg_NO`='$reg_no'") or die();	
					}
					if($num==0)
					{
						$qry46=mysql_query("select * from `persondetails2` where `pnic2`='$guestnic'") or die();
						$result1=mysql_fetch_array($qry46);
						$reg_no1=$result1['Reg_N0'];
						$query=mysql_query("select * from `checkin` where `Reg_NO`='$reg_no1'") or die();
					}
					
					
				}
				if($regno)
				{
					$query=mysql_query("select * from `checkin` where `Reg_NO`='$regno'") or die();
				}
				if($memberhsip)
				{
					if($memberhsip=='All')
					{
					 $query=mysql_query("select * from `checkin` where `Membership` IN('Platinum','Silver','Gold')");
					}else
					{
					$query=mysql_query("select * from `checkin` where `Membership` LIKE '$memberhsip'") or die();
					}
				}
				if($nic)
				{
					$query=mysql_query("select * from `checkin` where `NIC` LIKE '$nic%'") or die(mysql_error());	
				}else 
				if($card)
				{
					$query=mysql_query("select * from `checkin` where `CardNo` LIKE '$card%'") or die(mysql_error());
				}
				else 
				if($booth)
				{
					$query=mysql_query("select * from `checkin` where `BoothNo` LIKE '$booth%'") or die(mysql_error());
				}
				else
				
				if($name)
				{
					$query=mysql_query("select * from `checkin` where `Name` LIKE '$name%'") or die(mysql_error());	
				}else
				
				if($weaponname)
				{
					$query=mysql_query("select * from `checkin` where `WeaponName` LIKE '$weaponname%'") or die();	
				}else
				if($weapon)
				{
					$query=mysql_query("select * from `checkin` where `Weapon` LIKE '$weapon%'") or die();
				}else
				
				if($from)
				{
					$query=mysql_query("select * from `checkin` where `ArrivalDate`='$from'") or die();	
				}else
				if($to)
				{
					$query=mysql_query("select * from `checkin` where `ArrivalDate`='$to'") or die();
				}
				if($from && $to)
				{
					$query=mysql_query("select * from `checkin` where  `ArrivalDate`>='$from' AND `ArrivalDate`<='$to'") or die(mysql_error());	
			 	}
				if($name && $from)
				{
					$query=mysql_query("select * from `checkin` where  `Name`='$name' AND `ArrivalDate`>='$from'") or die(mysql_error());		
				}
				if($name && $to)
				{
					$query=mysql_query("select * from `checkin` where  `Name`='$name' AND `ArrivalDate`='$to'") or die(mysql_error());		
				}
				if($name && $from && $to)
				{
					$query=mysql_query("select * from `checkin` where  `Name`='$name' AND `ArrivalDate`>='$from' AND `ArrivalDate`<='$to'") or die(mysql_error());		
				}
				if($card && $from)
				{
					$query=mysql_query("select * from `checkin` where  `CardNo`='$card' AND `ArrivalDate`>='$from'") or die(mysql_error());		
				}
				if($card && $to)
				{
					$query=mysql_query("select * from `checkin` where  `CardNo`='$card' AND `ArrivalDate`='$to'") or die(mysql_error());		
				}
				if($card && $from && $to)
				{
					$query=mysql_query("select * from `checkin` where  `CardNo`='$card' AND `ArrivalDate`>='$from' AND `ArrivalDate`<='$to'") or die(mysql_error());		
				}
				if($regno && $from)
				{
					$query=mysql_query("select * from `checkin` where `Reg_NO`='$regno' AND `ArrivalDate`>='$from'") or die(mysql_error());		
				}
				if($regno && $to)
				{
					$query=mysql_query("select * from `checkin` where `Reg_NO`='$regno' AND `ArrivalDate`='$to'") or die(mysql_error());		
				}
				if($regno && $from && $to)
				{
					$query=mysql_query("select * from `checkin` where `Reg_NO`='$regno' AND `ArrivalDate`>='$from' AND `ArrivalDate`<='$to'") or die(mysql_error());		
				}
				if($nic && $from)
				{
					$query=mysql_query("select * from `checkin` where `NIC`='$nic' AND `ArrivalDate`>='$from'") or die(mysql_error());		
				}
				if($nic && $to)
				{
					$query=mysql_query("select * from `checkin` where `NIC`='$nic' AND `ArrivalDate`='$to'") or die(mysql_error());		
				}
				if($nic && $from && $to)
				{
					$query=mysql_query("select * from `checkin` where `NIC`='$nic' AND `ArrivalDate`>='$from' AND `ArrivalDate`<='$to'") or die(mysql_error());		
				}
				if($booth && $from)
				{
					$query=mysql_query("select * from `checkin` where `BoothNo`='$booth' AND `ArrivalDate`>='$from'") or die(mysql_error());		
				}
				if($booth && $to)
				{
					$query=mysql_query("select * from `checkin` where `BoothNo`='$booth' AND `ArrivalDate`='$to'") or die(mysql_error());		
				}
				if($booth && $from && $to)
				{
					$query=mysql_query("select * from `checkin` where `BoothNo`='$booth' AND `ArrivalDate`>='$from' AND `ArrivalDate`<='$to'") or die(mysql_error());		
				}
				if($memberhsip && $from)
				{
					$query=mysql_query("select * from `checkin` where `Membership`='$memberhsip' AND `ArrivalDate`>='$from'") or die(mysql_error());		
				}
				if($memberhsip && $to)
				{
					$query=mysql_query("select * from `checkin` where `Membership`='$memberhsip' AND `ArrivalDate`='$to'") or die(mysql_error());		
				}
				if($memberhsip && $from && $to)
				{
					$query=mysql_query("select * from `checkin` where `Membership`='$memberhsip' AND `ArrivalDate`>='$from' AND `ArrivalDate`<='$to'") or die(mysql_error());		
				}
				if($weapon && $from)
				{
					$query=mysql_query("select * from `checkin` where `Weapon`='$weapon' AND `ArrivalDate`='$from'") or die(mysql_error());		
				}
				if($weapon && $to)
				{
					$query=mysql_query("select * from `checkin` where `Weapon`='$weapon' AND `ArrivalDate`='$to'") or die(mysql_error());		
				}
				if($weapon && $from && $to)
				{
					$query=mysql_query("select * from `checkin` where `Weapon`='$weapon' AND `ArrivalDate`>='$from' AND `ArrivalDate`<='$to'") or die(mysql_error());		
				}
				if($weapon && $memberhsip)
				{
					$query=mysql_query("select * from `checkin` where `Weapon`='$weapon' AND `Membership`='$memberhsip'") or die();
				}
				
				
				
				$count=mysql_num_rows($query);					
				
		

?>

<div align="center" style="color:#000;margin-top:0px;"><Strong><h4>Advance Search</h4></strong><?php if($count=='0'){ echo '<div style="color:#F00"><strong>NO Result FOund</strong><div>';}?></div>

<table width="1109" border="1" align="center" style="color:#000;font-size:14px;">
  <tr style="background:#CCC">
    <th width="68" height="25" scope="col">S.NO</th>
    <th width="67" height="25" scope="col">Reg #</th>
    <th width="179" scope="col">Name</th>
    <th width="183" scope="col">Father Name</th>
    <th width="144" scope="col">NIC</th>
   	<th width="55" nowrap="nowrap" scope="col">Weapon</th>
    <th width="54" scope="col">Fires</th>
    <th width="56" scope="col"> Person</th>
    <th width="66" scope="col">Booth Charges</th>
    <th width="73" scope="col">Date</th>
    <th width="94" scope="col">Out Time</th>
  </tr>
  <?php
  			$i=1;
			$total="";
			$firetotal="";
  			while($row=mysql_fetch_array($query))
			{
				$total+=$row['RangeCharge'];
				$firetotal+=$row['Fire'];
  ?>
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php  echo $row['Reg_NO'];?></td>
    <td><a href="index.php?page=edit&id=<?php  echo $row['Reg_NO'];?>"><?php echo $row['Name'];?></a></td>
   <td><?php  echo $row['fname'];?></td>
    <td><?php  echo $row['NIC'];?></td>
    <td><?php echo $row['Weapon'];?></td>
    <td><?php echo $row['Fire'];?></td>
     <td><?php echo $row['Persons'];?></td>
    <td><?php echo $row['RangeCharge'];?></td>
    <td><?php echo $row['ArrivalDate'];?></td>
    <td><?php echo $row['TimeOut'];?></td>
  </tr>
  <?php $i++;}?>
</table>
<div style="margin-left:835px" align="center">
<span style="float:left">
<table width="60" border="1">
   	          <tr align="center">
              <td><?php echo $firetotal;?></td>
                
     </tr>
</table>
</span>
<span style="float:right;margin-right:278px">
<table width="70" border="1">
   	          <tr align="center">
               <td><?php echo $total;?></td>
                
     </tr>
</table>
</span>
</div>
<?php 	}?>
			<!----Search result when click button and field is empty------>
        	<?php		
						if(isset($_GET['by']) and $_GET['by']=="desc"){
									$_GET['by']="asc";
									}else
								if(isset($_GET['by']) and $_GET['by']=="asc")
								{
									$_GET['by']="desc";
								}
								
								if(isset($_GET['byname']) and $_GET['byname']=="desc"){
									$_GET['byname']="asc";
									}
									else
								if(isset($_GET['byname']) and $_GET['byname']=="asc")
								{
									$_GET['byname']="desc";
								}
								
            			if(empty($_GET['nic']) && empty($_GET['card']) && empty($_GET['booth']) && empty($_GET['name']) && empty($_GET['weaponname']) && empty($_GET['from']) && empty($_GET['weapon']) && empty($_GET['to']) && empty($_GET['fire']) && empty($_GET['membership']) && empty($_GET['regno']) && empty($_GET['guestnic']))
						{
							
							$qry=mysql_query("select * from `checkin` ORDER BY `Reg_NO` ".$_GET['by']."") or die();
							if($_GET['byname'])
							{
							$qry=mysql_query("select * from `checkin` ORDER BY `Name` ".$_GET['byname']."") or die();		
							}
			?>    
   
<div align="center" style="color:#000"><strong>Advance Search</strong></div>
<table width="1109" border="1" align="center" style="color:#000;font-size:14px;">
  <tr style="background:#CCC">
    <th width="64" height="32" scope="col">S.NO</th>
    <th width="62" height="32" scope="col"><?php if($_GET['by']==""){?><a href="index.php?page=advanceresult&by=asc">Reg #</a><?php }?><?php if(isset($_GET['by'])=='asc'){?><a href="index.php?page=advanceresult&by=desc">Reg #</a><?php }?></th>
    <th width="177" scope="col"><?php if($_GET['byname']==""){?><a href="index.php?page=advanceresult&byname=asc">Name</a><?php }?>
    <?php if(isset($_GET['byname'])=="asc"){?><a href="index.php?page=advanceresult&byname=desc">Name</a><?php }?>
    </th>
    <th width="193" scope="col">Father Name</th>
    <th width="160" scope="col">NIC</th>
    <th width="57" nowrap="nowrap" scope="col">Weapon</th>
    <th width="40" scope="col"> Fires</th>
     <th width="48" scope="col">Person</th>
    <th width="55" scope="col">Booth Charges</th>
    <th width="94" scope="col">Date</th>
    <th width="89" scope="col">Out Time</th>
  </tr>
  <?php
  			$i=1;
			$total="";
			$totalfire="";
  			while($row1=mysql_fetch_array($qry))
			{
				$total+=$row1['RangeCharge'];
				$totalfire+=$row1['Fire'];
  ?>
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php  echo $row1['Reg_NO'];?></td>
    <td><a href="index.php?page=edit&id=<?php  echo $row1['Reg_NO'];?>"><?php echo $row1['Name'];?></a></td>
   <td><?php  echo $row1['fname'];?></td>
    <td><?php  echo $row1['NIC'];?></td>
    <td><?php echo $row1['Weapon'];?></td>
    <td><?php echo $row1['Fire'];?></td>
     <td><?php echo $row1['Persons'];?></td>
<td><?php echo $row1['RangeCharge'];?></td>
     <td><?php echo $row1['ArrivalDate'];?></td>
    <td><?php echo $row1['TimeOut'];?></td>
    </tr>
  <?php $i++;}?>
</table>
<div style="margin-left:848px" align="center">
<span style="float:left">
<table width="50" border="1">
   	          <tr align="center">
              <td><?php echo $totalfire;?></td>
              </tr>
</table>
</span>
<span style="float:right;margin-right:288px">
<table width="65" border="1">
   	          <tr align="center">
               <td><?php echo $total;?></td>
              </tr>
</table>
</span>
</div>
<?php } ?>

