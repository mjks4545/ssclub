<?php
				if(isset($_POST['submit']))
				{
					$search=$_POST['search'];
					
					header("Location:index.php?page=searchresult&search=$search");	
				
				}
			
?>

<div align="center" style="padding-top:100px;color:#000"><strong>Search By Reg / NIC # / Card # / Name / Telephone No</strong></div>

<div align="center" style="color:#000;padding-top:20px;">

<form  action="" method="post">
  <table width="200" border="1">
    <tr>
      <td><input type="text" name="search" required></td>
    </tr>
    <tr>
      <td align="center"><button type="submit" class="btn btn-large btn-primary" name="submit">Search</button></td>
    </tr>
  </table>
</form>
</div>