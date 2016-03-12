<?php
			if(isset($_POST['submit']))
			{
				$nic=ltrim($_POST['search']);
				//$cardrno=$_POST['cardno'];
				
				header("Location:index.php?page=checkin&nic=$nic");	
				
			}

?>

<div align="center" style="padding-top:100px;color:#000"><strong>SEARCH NIC / CARD NO:</strong></div>

<div align="center" style="color:#000;padding-top:20px;">

<form  action="" method="post">
  <table width="200" border="1">
    <tr>
       <td nowrap="nowrap">Enter NIC / Card NO</td>
      <td><input type="text" name="search" id="search" required="required" autofocus="autofocus"></td>
    </tr>
    <tr align="center">
      <td colspan="2" nowrap="nowrap"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Search"></td>
    </tr>
    </table>
</form>



</div>