<?php 
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$query=mysql_query("select * from `membership` where `M_id`='$id'") or die(mysql_error());
			
?>

<table width="790" border="1" align="center" style="color:#000;font-size:16px;">
  <tr style="background:#CCC">
    <th width="130" scope="col">Name</th>
    <th width="179" scope="col">CNIC</th>
    <th width="216" scope="col">Mobile</th>
    <th width="229" scope="col">Address</th>
  </tr>
  <?php
  		$row=mysql_fetch_array($query)
				
  ?>
  <tr align="center">
    <td height="32"><?php echo $row['Name'];?></td>
    <td><?php echo $row['Cnic'];?></td>
    <td><?php echo $row['Mobile'];?></td>
    <td><?php echo $row['Address'];?></td>
  </tr>
 </table>
<p align="center" style="color:#F00;font-size:16px;font-weight:bold;margin-top:10px;">Payment History</p>
<table width="786" border="1" align="center" style="color:#000;font-size:16px;">
  <tr style="background:#CCC">
    <th width="138" scope="col">S.NO</th>
    <th width="319" scope="col">Payment</th>
    <th width="307" scope="col">Date</th>
    <th width="307" scope="col">Valid Till</th>
  </tr>
  <?php $query1=mysql_query("select * from renewal_fees where `M_id`='$id'") or die(mysql_error());
  		$i=1;
		while($row1=mysql_fetch_array($query1)) 
		{
  ?>
  <tr align="center" >
    <td><?php echo $i;?></td>
    <td><?php echo $row1['R_paymet'];?></td>
    <td><?php echo $row1['Date'];?></td>
    <td><?php echo date("Y-m-d", strtotime(date("Y-m-d", strtotime($row1['Date'])) . " + 1 year"));?></td>
  </tr>
  <?php $i++;}?>
</table>
<?php }?>