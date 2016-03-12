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
<div class="main">
    <h1>LogDetails</h1>
</div>
<table class="responstable">
  
  <tr>
    <th>S.NO</th>
    <th data-th="Driver details"><span>User Name</span></th>
    <th>Activity</th>
    <th>Customer Name</th>
    <th>Time</th>
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
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo  $username['username'];?></td>
    <td><?php echo $row['Activity'];?></td>
    <td><?php echo $nameid['Name'];?></td>
    <td><?php echo $row['startdatetime'];?></td>
  </tr>
  <?php $i++;}?>
</table>

<div id="container123">
	<div class="pagination">
            <?php
			$pre=$name-1;
			$next=$name+1;
			if(!$start<1)
			{
			echo "<a href='index.php?page=logsactivity&name=$pre' class='page'>previous</a>";
			}
			
			
			for($i=1;$i<=$no_of_pages;$i++)
			{
				
				echo "<a href='index.php?page=logsactivity&name=$i' class='page'>$i</a>";	
				
			}
						
?>
		
	</div>

	

	

	
</div>

