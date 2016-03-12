<?php
			$qry=mysql_query("select * from `membership`") or die(mysql_error());

?>
<table width="1102" border="1" align="center" style="color:#000;font-size:16px">
  <tr style="background:#999">
    <th width="77" scope="col">S.NO</th>
    <th width="103" scope="col">Name</th>
    <th width="114" scope="col">CNIC</th>
    <th width="157" scope="col">Mobile</th>
    <th width="170" scope="col">Membership</th>
    <th width="163" scope="col">CardNo</th>
    <th width="134" scope="col">Validto</th>
    <th width="132" scope="col">ACTION</th>
  </tr>
  <?php 
  			$i=1;
			while($row=mysql_fetch_array($qry))
			{
  ?>
  <tr align="center">
    <td height="23"><?php echo $i;?></td>
    <td><?php echo $row['Name'];?></td>
    <td><?php echo $row['Cnic']; ?></td>
    <td><?php echo $row['Mobile'];?></td>
    <td><?php echo $row['Membership'];?></td>
    <td><?php echo $row['CardNo'];?></td>
    <td><?php echo $row['Validto'];?></td>
    <td><a href="index.php?page=editmember&id=<?php echo $row['M_id'];?>">EDIT</a></td>
  </tr>
  <?php $i++;}?>
</table>
