<?php
				if(isset($_POST['submit']))
				{
					$nic=ltrim($_POST['nic']);
					
					header("Location:index.php?page=renewmember&nic=$nic");
					
				}

?>

<form name="form1" method="post" action="">
  <table width="368" border="1" align="center" style="color:#000;">
    <tr>
      <th width="184" height="49" scope="row">Enter CNIC</th>
      <td width="168"><input type="text" name="nic" id="nic" autofocus="autofocus" required></td>
    </tr>
    <tr>
      <th height="47" colspan="2" scope="row"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Search"></th>
    </tr>
  </table>
  </form>



