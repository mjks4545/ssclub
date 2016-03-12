<?php
				if(isset($_POST['submit']))
				{
					$pname=$_POST['product'];
					$ptype=$_POST['subproduct'];
					$pmodel=$_POST['pmodel'];
					
				    header("Location:store.php?page=stockresult&pname=$pname&ptype=$ptype&pmodel=$pmodel");
					
				}

?>
<div class="main">
    
    <h1>Stock</h1>

</div>
<form name="form1" method="post" action="" style="color:#000;">
    <table class="responstable">
    <tr>
      <td>Product Name : </td>
      <td><select name="product" id="product" onchange="getPurch(this.value)">
     	 <option selected="selected"  value="">--Select Option--</option>
      	<option value="Acessories">Acessories</option>
      	<option value="Ammunition">Ammunition</option>
         <option value="Rifle">Rifle</option>
         <option value="Pistol">Pistol</option>
         <option value="Shortgun">Shortgun</option>
         <option value="Air Rifle">Air Rifle</option>
   		 </select></td>
    </tr>
    <tr>
     <td>Prd Code</td>
     <td><input type="text" name="pcode" id="pcode" oninput=""></td>
    </tr>
    <tr>
      
      <td>Product TYPE & MODEL</td>
      <td><div id="subcat"></div><div id="subofsubcat"></div></td>
    </tr>
    <tr>
    <td colspan="2" scope="row"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Search Stock"></td>
    </tr>
  </table>
</form>
