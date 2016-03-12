<script>
function validate()
{
 
   if( document.form1.payments.value == "" )
   {
     alert( "Please Fill Payments field!" );
     document.form1.payments.focus() ;
     return false;
   }
    return( true );
}
</script>
<?php
			
			if(isset($_GET['nic']))
			{
			// select records
				 $nic=$_GET['nic'];
				 $query=mysql_query("select * from `membership` where `Cnic`='$nic'") or die();
				$row=mysql_fetch_array($query);
			     $mid=$row['M_id'];
				
			// update records	
			if(isset($_POST['submit']))
			{
			$nic=$_GET['nic'];
			$validfrom=$_POST['validfrom'];
			$renewdate=$_POST['renewdate'];
			//$fee=$_POST['fee'];
			$payments=$_POST['payments'];
			if($validfrom!="" && $payments!="")
			{
			mysql_query("update `membership` SET `Validfrom`='$validfrom',`Validto`='$renewdate' where `Cnic`='$nic'") or die(mysql_error());
			
			$date=date("Y-m-d");
			// insertion of renewal fee
			mysql_query("insert into `renewal_fees` values ('','$payments','$date','$mid')") or die(mysql_error());
			}
			header("Location:index.php?page=paymenthistory&id=$mid&msg=Record Renewel Successfully");
			}
			
?>
<div align="center" style="color:#000">
<div align="center"><?php if(isset($_GET['msg'])) { echo $_GET['msg'];}?></div>
  <h4> Member Renewel</h4></div>
<form method="post" action="" name="form1" onsubmit="return(validate());">
<table width="1004" border="1" align="center" style="color:#000">
  <tr align="center">
    <th width="110" height="51" scope="row">Name</th>
    <td width="323"><input type="text" name="textfield" id="textfield" value="<?php echo $row['Name'];?>" disabled></td>
    <td width="133"><strong>CNIC</strong></td>
    <td width="410"><input type="text" name="textfield2" id="textfield2" value="<?php  echo $row['Cnic'];?>" disabled></td>
  </tr>
  <tr align="center">
    <th height="51" scope="row">Mobile</th>
    <td><input type="text" name="textfield3" id="textfield3" value="<?php echo $row['Mobile'];?>" disabled></td>
    <td><strong>Address</strong></td>
    <td><input type="text" name="textfield4" id="textfield4" value="<?php echo $row['Address'];?>" disabled></td>
  </tr>
  <tr align="center">
    <th height="58" scope="row">Membership</th>
    <td><input type="text" name="textfield4" id="textfield4" value="<?php echo $row['Membership'];?>" disabled></td>
    <td><strong>Card NO</strong></td>
    <td><input type="text" name="textfield4" id="textfield4" value="<?php echo $row['CardNo'];?>" disabled></td>
  </tr>
  <tr align="center">
    <th height="56" scope="row">Fee Schedule</th>
    <td><input type="text" name="fee" id="fee" value="<?php echo $row['schedule'];?>" disabled="disabled"/></td>
    <td><strong>Payments</strong></td>
    <td><input type="text" name="payments" id="payments" /></td>
  </tr>
  <tr align="center">
    <th height="56" scope="row">Valid From</th>
    <td><input type="date" id="textfield4" value="<?php echo $row['Validfrom'];?>" name="validfrom"></td>
    <td><strong>Valid TO</strong></td>
    <td><input type="date" name="renewdate" id="textfield4" value="<?php echo $row['Validto'];?>"></td>
  </tr>
  <tr>
    <th height="40" colspan="4" scope="row"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Update"></th>
  </tr>
</table>
</form>
<?php }?>