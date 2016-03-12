<?php
			if($_GET['name'] || $_GET['nic'] || $_GET['cardno'] || $_GET['membership'] || $_GET['mobile'] || $_GET['license'])
				{
					$name=$_GET['name'];
					$nic=$_GET['nic'];
					$cardno=$_GET['cardno'];
					$membership=$_GET['membership'];
					$mobile=$_GET['mobile'];
					$license=$_GET['license'];
					
					if($name)
					{
						$query=mysql_query("select * from `membership` where `Name` LIKE '$name%'") or die(mysql_error());	
					}else
						if($nic)
						{
						$query=mysql_query("select * from `membership` where `Cnic` LIKE '$nic%'") or die(mysql_error());
						
						}
						else 
						if($cardno)
						{
						$query=mysql_query("select * from `membership` where `CardNo` LIKE '$cardno%'") or die(mysql_error());	
						}
						else
						if($membership)
						{
						$query=mysql_query("select * from `membership` where `Membership`='$membership'") or die(mysql_error());	
						}
						else
						if($mobile)
						{
						$query=mysql_query("select * from `membership` where `Mobile` LIKE '$mobile%'") or die(mysql_error());
						}
						else
						if($license)
						{
						$query=mysql_query("select * from `membership` where `Licenseno` LIKE '$license%'") or die(mysql_error());
						}
						if($membership && $license)
						{
						$query=mysql_query("select * from `membership` where `Membership`='$membership' AND `Licenseno`='$license'") or die(mysql_error());	
						}
					
				

?>
<div align="center" style="color:#000"><strong>Member Search</strong></div>
<table width="1165" border="1" align="center" style="color:#000;">
    <tr style="background:#CCC">
      <th width="57" scope="col">S.NO</th>
      <th width="101" scope="col">Name</th>
      <th width="56" scope="col">CNIC</th>
      <th width="100" scope="col">Licence No :</th>
      <th width="132" scope="col">Mobile</th>
      <th width="160" scope="col">Payment</th>
      <th width="129" scope="col">Membership</th>
      <th width="114" scope="col">Card No</th>
      <th width="105" scope="col">Valid From</th>
      <th width="108" scope="col">Valid To</th>
      <th width="139" scope="col">Renewal Due</th>
    </tr>
    <?php	
			$i=1;
			$payment=0;
    		while($row=mysql_fetch_array($query))
			{
                        //print_r($row);
				$payment+=$row['payments'];
	?>
    <tr align="center">
      <td ><?php echo $i;?></td>
      <td><a href="index.php?page=memberedit&id=<?php  echo $row['M_id'];?>"><?php echo $row['Name'];?></a></td>
      <td><?php echo $row['Cnic'];?></td>
      <td><?php echo $row['Licenseno'];?></td>
      <td><?php echo $row['Mobile'];?></td>
      <td><?php echo $row['payments'];?></td>
      <td><?php echo $row['Membership'];?></td>
      <td><?php echo $row['CardNo'];?></td>
      <td><?php echo $row['Validfrom'];?></td>
      <td><?php echo $row['Validto'];?></td>
      <td>
       <span style="background:#FFF;padding:0px;">
   <?php 
   	$member=$row['Membership'];
   	if($member=="Silver" || $member=="Gold" || $member=="Platinum")
	{
	$date=date('Y-m-d');
	$expiredate=$row['Validto'];
	
	 if($date>$expiredate)
	 { 
	 echo '<span style="color:red;font-size:16px;font-weight:bold">Expired</span>'; 
	 }
	 else
	 {
	 	
	echo '<span style="color:green;font-size:16px;font-weight:bold">Member</span>'; 
	 }
	 }
	 ?>
     </span>
      </td>
    </tr>
    <?php $i++;}?>
  </table>
  <div style="margin-left:460px;">
  		<table border="1" width="160" height="50">
        	<tr align="center">
            	<td><?php echo $payment;?></td>
            </tr>
        </table>
  </div> 
<?php }?>
<?php
				if(empty($_GET['name']) && empty($_GET['nic']) && empty($_GET['cardno']) && empty($_GET['membership']) && empty($_GET['mobile']) && empty($_GET['license']))
				{
					
			
?>
<div align="center" style="color:#000"><strong>Member Search</strong></div>
<table width="1165" border="1" align="center" style="color:#000;">
    <tr style="background:#CCC">
      <th width="57" scope="col">S.NO</th>
      <th width="101" scope="col">Name</th>
      <th width="73" scope="col">CNIC</th>
      <th width="101" scope="col">Mobile</th>
      <th width="174" scope="col">Service/Business</th>
      <th width="129" scope="col">Membership</th>
      <th width="114" scope="col">Card No</th>
      <th width="105" scope="col">Valid From</th>
      <th width="108" scope="col">Valid To</th>
      <th width="139" scope="col">Renewal Due</th>
    </tr>
   </table>
   <?php }?>