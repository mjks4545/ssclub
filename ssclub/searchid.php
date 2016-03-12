
<?php
			if(isset($_POST['submit']))
			{
				$nic=ltrim($_POST['search']);
				//$cardrno=$_POST['cardno'];
				
				header("Location:index.php?page=checkin&nic=$nic");	
				
			}

?>
<form  action="" method="post">
<table class="responstable">
  
  <tr>
    <th>Enter NIC / Card NO</th>
  </tr>
  
  <tr>
    <td><input type="text" name="search" id="search" style="border-radius: 10px !important;width: 500px;" required="required" autofocus="autofocus"/></td>
  </tr>
  
  <tr>
      <td><input type="submit" name="submit" class="btn btn-large btn-primary" style="border-radius: 10px;" value="Search"></td>
  </tr>
  
</table>
</form>

