<?php
								
				if(isset($_GET['id']))
				{
					$id=$_GET['id'];
					
					$query=mysql_query("select * from `checkin` where `Reg_NO`='$id'") or die(mysql_error());
					$row=mysql_fetch_array($query);	
					$name=$row['Name'];
					$date=$row['ArrivalDate'];
					$nic=$row['NIC'];
				}
				
				if(isset($_POST['submit']))
				{
					
					$id=$_POST['id'];
					header("Location:index.php?page=showbill&id=$id");
					
				}

?>
<?php 
  			//if($row['Persons']!=1)
			//{
			$moredetails=mysql_query("select * from `persondetails` where `Reg_NO`='$id'") or die(mysql_error());
			$row1=mysql_fetch_array($moredetails);
			$morepersons=mysql_query("select * from `persondetails2` where `Reg_No`='$id'") or die(mysql_error());
			$row2=mysql_fetch_array($morepersons);
  ?>

<div class="main">
    
    <h2>Result for : <?php if(isset($id)) { echo $row['Name'];}?></h2><br />
    <h1>Reg NO:<?php  echo $id ;?></h1>
    <h3>Date : <?php echo $row['ArrivalDate']; ?></h3>
    
</div>

<table class="responstable">
  
  <tr>
    <td>Name :</td>
    <td><?php if(isset($id)) {echo $row['Name'];}?></td>
    <td>Father Name :</td>
    <td><?php if(isset($id)){ echo $row['fname'];}?></td>
    
  </tr>
  
  <tr>
    <td>License NO :</td>
    <td><?php  if(isset($id)){ echo $row['LicenseNO'];}?></td>
    <td>Card No :</td>
    <td><?php echo $row['CardNo'];?></td>
    
  </tr>
  
  <tr>
    <td>NIC NO :</td>
    <td><?php if(isset($id)){echo $row['NIC'];;}?></td>
    <td>Arrival Time :</td>
    <td><?php if(isset($id)){echo $row['ArrivalTime'];}?></td>
    
  </tr>
  
  <tr>
    <td>MemberShip :</td>
    <td><?php echo $row['Membership'];?></td>
    <td>Address :</td>
    <td><?php if(isset($id)){ echo $row['Address'];}?></td>
    
  </tr>
  
  <tr>
    <td>Picture :</td>
    <td><?php
		 $query1=mysql_query("select `Picture` from `checkin` where `Name`='$name' ORDER BY `Name` ASC") or die();
		 $picture=mysql_fetch_array($query1);
		 $pic=$picture['0'];		
	?><?php if(isset($id)){?>
        <img src="picture/<?php echo $pic?>" width="30%" height="50px;">
    <?php }?> </td>
    <td>Weapon :</td>
    <td><?php echo $row['Weapon'];?></td>
    
  </tr>
  <tr>
    <td>Weapon Name/NO :</td>
    <td><?php if(isset($id)){ echo $row['WeaponName'];}?></td>
    <td>Mobile No :</td>
    <td><?php if(isset($id)){ echo $row['TelephoneNo'];}?></td>
    
  </tr>
  <tr>
    <td>No of Fire :</td>
    <td><?php echo $row['Fire'];?></td>
    <td>Shooting Experience :</td>
    <td><?php echo $row['s_experience'];?></td>
    
  </tr>
  <tr>
    <td>Date :</td>
    <td><?php echo $row['ArrivalDate'];?></td>
    <td>Profession :</td>
    <td><?php  if(isset($id)){ echo $row['Profession'];}?></td>
    
  </tr>
  <tr>
      <th>Booth No :</th>
      <th>No of Persons :</th>
      <th>Range Charges :</th>
      <th>Remarks :</th>
  </tr>
  <tr >
            <td><?php if(isset($id)){ echo $row['BoothNo'];}?></td>
            <td><?php if(isset($id)){ echo $row['Persons'];}?></td>
            <td><?php echo $row['RangeCharge'];?></td>
            <td><?php echo $row['Remarks'];?></td>
  </tr>
  <tr>
      <th>Name :</th>
      <th>Cell No :</th>
      <th>NIC :</th>
      <th>Address :</th>
  </tr>
  <tr>
        <td><?php echo $row1['pname'];?></td>
 	<td><?php echo $row1['pcell'];?></td>
 	<td><?php echo $row1['pnic'];?></td>
 	<td><?php echo $row1['paddress'];?></td>
  </tr>
  <tr>
        <td><?php echo $row2['pname2']; ?></td>
        <td><?php echo $row2['pcell2'] ;?></td>
        <td><?php echo $row2['pnic2']; ?></td>
        <td><?php echo $row2['paddress2'];?></td>
  </tr>
  <tr>
      <td colspan="2">Bill # :</td>
      <td colspan="2"><?php
    			// get bill number
				
				$qry=mysql_query("select * from `sales` where `NIC`='$nic' AND `Date`='$date'") or die();
				$row1=mysql_fetch_array($qry);
				$sid=$row1['Sid'];
				// selectt bill_number
				$qry1=mysql_query("select * from `salesbill` where `s_id`='$sid'") or die();
				$row2=mysql_fetch_array($qry1);
				$billno=$row2['sb_id'];
				
	
	
	?><?php if($_SESSION['Role']=='administrator')
				{?><a href="store.php?page=salebillreport&id=<?php echo $sid;?>"><?php echo $billno;}else{ ?><?php 
					
					echo $billno;
					}?></a></td>
  </tr>
</table>
    
<form action="" method="post">
<input type="hidden" value="<?php if(isset($_GET['id'])) { echo  $_GET['id'];}?>" name="id">
<!--<div align="center"><input name="submit" type="submit" class="btn btn-large btn-primary" id="submit" value="View Bill"></div>-->
</form>

