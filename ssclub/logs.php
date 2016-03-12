<?php
			
			 $start=0;
			 $end="";
			 $per_page=20;
				
				if(isset($_GET['name']))
				{
					
					$name=$_GET['name'];	
					$start=($name-1)*$per_page;
				}else{
						$name=1;
						
					}
?>
<?php
			
			$totalrecord=mysql_query("select * from `logs`") or die();								
			$query=mysql_query("select * from `logs` LIMIT $start,$per_page") or die(mysql_error());
			$count=mysql_num_rows($totalrecord);
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
		
			
?>

<div style="color:#000;margin-top:l0px;" align="center"><strong><h4>Logs Time</h4></strong></div>
<table width="875" border="1" align="center" style="color:#000;font-size:16px;">
  <tr>
    <th width="117" height="23" scope="col">S.No</th>
    <th width="135" scope="col" nowrap="nowrap">User Name</th>
    <th width="225" scope="col">Login time</th>
    <th width="219" scope="col">Logout time</th>
   
  </tr>
  <?php 
  		
		
  		while($row=mysql_fetch_array($query))
		{
			$uid=$row['u_id'];
			
			$record=mysql_query("select * from `registration` where `u_id`='$uid'") or die();
			$user=mysql_fetch_array($record);
			
?>
  <tr align="center">
    <td height="30"><?php echo $i;?></td>
    <td><?php echo $user['username'];?></td>
   <td><?php echo $row['startdatetime'];?></td>
    <td><?php echo $row['endtimedate'];?></td>
   
  </tr>
  <?php $i++;}?>
</table>

<div style="color:#F00;font-size:14px;text-align:center;">
<?php
			$pre=$name-1;
			$next=$name+1;
			if(!$start<1)
			{
			echo '<a href="index.php?page=logs&name='.$pre.'">Previous:&nbsp;</a>';
			}
			echo "Page";
			for($i=1;$i<=$no_of_pages;$i++)
			{
				
				echo '&nbsp;<a href="index.php?page=logs&name='.$i.'">&nbsp;'.$i.'</a>';	
				
			}
			
?>
</div>
