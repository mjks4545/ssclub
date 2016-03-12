<div align="center" style="color:#000"><strong>Search All Members</strong></div>
<?php 
			error_reporting(0);
?>
<table width="1120" border="1" align="center" style="color:#000;">
  <tr>
    <th width="37" height="28" scope="col">S.NO</th>
    <th width="152" scope="col"><?php if($_GET['byname']==""){?><a href="index.php?page=searchallmember&byname=asc">Name</a><?php }?>
    <?php if(isset($_GET['byname'])=="asc"){?><a href="index.php?page=searchallmember&byname=desc">Name</a><?php }?>
    </th>
    <th width="107" scope="col">CNIC</th>
    <th width="117" scope="col">Mobile</th>
    <th width="140" scope="col">Payment</th>
    <th width="127" scope="col">Membership</th>
    <th width="114" scope="col">Card No</th>
    <th width="93" scope="col">Valid From</th>
    <th width="83" scope="col">Valid To</th>
    <th width="86" scope="col">Renewal Due</th>
  </tr>
  <?php	
			$i=1;
			if(isset($_GET['byname']) and $_GET['byname']=="desc")
					{
						$_GET['byname']="asc";
					}else
			if(isset($_GET['byname']) and $_GET['byname']=="asc")
					{
					$_GET['byname']="desc";
					}
					
			$query=mysql_query("select * from `membership` ORDER BY `Name` ".$_GET['byname']."") or die();
			$pay="";
    		while($row=mysql_fetch_array($query))
			{
				$member=$row['Membership'];
				$pay+=$row['payments'];
	?>
  <tr align="center">
    <td ><?php echo $i;?></td>
    <td><a href="index.php?page=memberedit&id=<?php  echo $row['M_id'];?>"><?php echo $row['Name'];?></a></td>
    <td><?php echo $row['Cnic'];?></td>
    <td><?php echo $row['Mobile'];?></td>
    <td><?php echo $row['payments'];?></td>
    <td><?php echo $row['Membership'];?></td>
    <td><?php echo $row['CardNo'];?></td>
    <td><?php echo $row['Validfrom'];?></td>
    <td><?php echo $row['Validto'];?></td>
    <td nowrap="nowrap">
    <span style="background:#FFF;padding:0px;">
   <?php 
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
 <div style="margin-left:520px;">
  		<table border="1" width="160" height="50">
        	<tr align="center">
            	<td><?php echo $pay;?></td>
            </tr>
        </table>
  </div>  
