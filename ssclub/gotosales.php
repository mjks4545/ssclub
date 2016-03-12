<?php
			if(isset($_POST['submit']))
			{
					$nic=ltrim($_POST['nic']);
					header("Location:store.php?page=sales&nic=$nic");
			}

?>
<div class="main">
    <h1 style="width: 302px;">INPUT SALES</h1>
</div>
<form name="form1" method="post" action="" style="color:#000">
    <table class="responstable">
      <tr>
          <th colspan="2">Enter NIC NO</th>
      </tr>
    <tr>
        <td><input style="width: 596px;border-radius: 10px !important;" type="text" name="nic" id="nic" autofocus></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Search"></td>
    </tr>
  </table>
</form>
