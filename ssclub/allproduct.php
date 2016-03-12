<div align="center" style="color:#03F;font-size:16px"><?php  if(isset($_GET['msg'])){ echo $_GET['msg'];}?></div>
<div align="center" style="font-size:16px;color:#F00;margin:10px;"><strong>ALL PRODUCT</strong></div>
<table width="857" border="1" align="center" style="font-size:16px;color:#000">
  <tr>
    <th width="79" scope="col">S.NO</th>
    <th width="164" scope="col">Product Name</th>
    <th width="177" scope="col">Product Type</th>
    <th width="187" scope="col">Prodcut Model</th>
    <th width="216" scope="col">Action</th>
  </tr>
  <?php 
  		
		$query=mysql_query("select * from product") or die(mysql_error());
		$i=1;
		while($row=mysql_fetch_array($query))
		{
  ?>
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $row['p_name'];?></td>
    <td><?php echo $row['p_type'];?></td>
    <td><?php echo $row['pmodel'];?></td>
    <td><a href="delete.php?id=<?php echo $row['p_id'];?>" onclick="return confirm('ARE YOU SURE TO DELETE THIS RECORD?');">DELETE</a></td>
  </tr>
  <?php $i++;}?>
</table>
