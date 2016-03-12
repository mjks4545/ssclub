<?php
			if(isset($_POST['submit']))
			{
					$nic=ltrim($_POST['nic']);
					header("Location:store.php?page=sales&nic=$nic");
			}

?>
<div align="center" style="color:#000;margin-bottom:20px;margin-top:50px;"><strong>INPUT SALES</strong></div>
<form name="form1" method="post" action="" style="color:#000">
  <table width="322" border="1" align="center">
    <tr>
      <th width="141" height="53" scope="row">Enter NIC NO</th>
      <td width="165"><input type="text" name="nic" id="nic" autofocus></td>
    </tr>
    <tr>
      <th height="45" colspan="2" scope="row"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Search"></th>
    </tr>
  </table>
</form>
