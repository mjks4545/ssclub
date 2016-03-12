<?php
				if(isset($_POST['submit']))
				{
					$pname=$_POST['product'];
					$ptype=$_POST['subproduct'];
					$pmodel=$_POST['pmodel'];
					
				    header("Location:store.php?page=stockresult&pname=$pname&ptype=$ptype&pmodel=$pmodel");
					
				}

?>
<div align="center" style="color:#000;"><strong><h3>Stock</h3></strong></div>
<form name="form1" method="post" action="" style="color:#000;">
  <table width="635" border="1" align="center">
    <tr>
      <th width="296" scope="row">Product Name</th>
      <td width="323"><select name="product" id="product" onchange="getPurch(this.value)">
     	 <option selected="selected"  value="">--Select Option--</option>
      	<option value="Acessories">Acessories</option>
      	<option value="Fire Arms">Fire Arms</option>
      	<option value="Ammunition">Ammunition</option>
         <option value="Air Rifle">Air Rifle</option>
   		 </select></td>
    </tr>
    <tr>
      <th scope="row">Product TYPE & MODEL</th>
      <td><div id="subcat"></div></td>
    </tr>
    <tr>
    <th colspan="2" scope="row"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Search Stock"></th>
    </tr>
  </table>
</form>
