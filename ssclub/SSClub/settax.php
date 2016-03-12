<?php
			if(isset($_POST['submit']))
			{
				$extras=$_POST['extras'];
				$salestax=$_POST['sales_tax'];
				
				mysql_query("insert into `settax` values('','$extras','$salestax')") or die(mysql_error());
				
				header("Location:store.php?page=settax&msg=Record Insert Successfully");
			}

?>
<div align="center" style="color:#F00;"><strong><?php if(isset($_GET['msg'])){ echo $_GET['msg'];}?></strong></div>
<div align="center" style="color:#000;margin-bottom:10px;"><strong>SET TAX</strong></div>
<form name="form1" method="post" action="">
  <table width="436" border="1" align="center" style="color:#000">
    <tr>
      <th width="169" height="40" scope="row">Extras</th>
      <td width="251"><input type="text" name="extras" id="extras"></td>
    </tr>
    <tr>
      <th height="41" scope="row">Salas Tax</th>
      <td><input type="text" name="sales_tax" id="sales_tax"></td>
    </tr>
    <tr>
      <th height="40" colspan="2" scope="row"><span style="margin-top:50px;">
        <input type="submit" name="submit" class="btn btn-large btn-primary" value="Save">
      </span></th>
    </tr>
  </table>
</form>
