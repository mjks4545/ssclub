<?php
			 $start=0;
			 $end="";
			 $per_page=20;
				
				if(isset($_GET['name']))
				{
					$name=$_GET['name'];	
					$start=($name-1)*$per_page;
				}
				else{
						$name=1;
					}
				

?>
<div style="color:#000;margin-top:0px;" align="center"><strong><h4>LogDetails</h4></strong></div>

<table width="1024" border="1" align="center" style="color:#000;font-size:16px;">
  <tr>
    <th width="55" scope="col">S.NO</th>
    <th width="172" nowrap="nowrap" scope="col">User Name</th>
    <th width="308" scope="col">Activity</th>
   	 <th colspan="3" scope="col"> Customer Name</th>
     <th width="142" scope="col" colspan="3"> Time</th>
  </tr>
  <?php
  				$record=mysql_query("select * from `logs`") or die(mysql_error());
				$query=mysql_query("select * from `logs` LIMIT $start,$per_page") or die();
				
				$count=mysql_num_rows($record);
				
			 $no_of_pages=ceil($count/$per_page);
			
				 if(isset($_GET['name']))
						{
							$name=$_GET['name'];
							$i=($name-1)*$per_page+1;
						}
						else
							{
								$i=1;
							}	
		
		
				while($row=mysql_fetch_array($query))
				{
					
					$uid=$row['u_id'];
					$regid=$row['Reg_NO'];
					$user=mysql_query("select * from `registration` where `u_id`='$uid'") or die(mysql_error());
					$checkin=mysql_query("select * from `checkin` where `Reg_NO`='$regid'") or die(mysql_error());
					
					$nameid=mysql_fetch_array($checkin);
					$username=mysql_fetch_array($user);
					
					
  ?>
  <tr align="center">
    <td height="28"><?php echo $i;?></td>
    <td><?php echo  $username['username'];?></td>
    <td><?php echo $row['Activity'];?></td>
    <td width="233"><?php echo $nameid['Name'];?></td>
    <td width="17" colspan="3"><?php echo $row['startdatetime'];?></td>
  </tr>
  <?php $i++;}?>
</table>
<div style="color:#F00;font-size:14px;text-align:center;">
<?php
			$pre=$name-1;
			$next=$name+1;
			if(!$start<1)
			{
			echo '<a href="index.php?page=logsactivity&name='.$pre.'">Previous:&nbsp;</a>';
			}
			
			echo "Page";
			for($i=1;$i<=$no_of_pages;$i++)
			{
				
				echo '&nbsp;<a href="index.php?page=logsactivity&name='.$i.'">&nbsp;'.$i.'</a>';	
				
			}
						
?>
</div>