<?php 
  
	$query=mysql_query("select * form `registration` where `id`='$id'") or die();
	$row=mysql_fetch_array($query);
	echo $row['name'];
	echo $row['Username'];
	echo $row['CNIC'];
	echo $row['Password'];
	echo $row['Contact'];
	echo $row['Status'];
	
	$row=mysql_query("SELECT * from `registration`");
  	
  

?>
<div style="padding-top:100px;">
  <table width="861" height="69" border="1" align="center" style="color:#000">
    <tr style="font-size:16px">
      <th width="72" align="center" scope="col"><strong>User Id</strong></th>
      <th width="124" align="center" scope="col"><strong>Username</strong></th>
      <th width="162" align="center" scope="col"><strong>CNIC</strong></th>
      <th width="121" align="center" scope="col"><strong>Password</strong></th>
      <th width="109" align="center" scope="col"><strong>Contact</strong></th>
      <th width="102" align="center" scope="col"><strong>Role</strong></th>
      <th width="64" align="center" scope="col"><strong>Status</strong></th>
      <th width="67" align="center" scope="col"><strong>Action</strong></th>
    </tr>
    <?php while ( $result=mysql_fetch_array($row))
   { ?>
    <tr style="font-size:12px">
      <td align="center"><?php echo $result['u_id']; ?></td>
      <td align="center"><?php echo $result['username']; ?></td>
      <td align="center"><?php echo $result['CNIC']; ?></td>
      <td align="center"><?php echo $result['password']; ?></td>
      <td align="center"><?php echo $result['Contact']; ?></td>
      <td align="center"><?php echo $result['Role']; ?></td>
      <td align="center"><?php echo $result['Status']; ?></td>
      <td align="center"><a href="update.php?uid=<?php echo $result['u_id'];?>">Activate</a></td>
    </tr>
    <?php } ?>
  </table>
</div>
