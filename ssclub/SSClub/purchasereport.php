<?php
			if(isset($_POST['submit']))
			{
				$cname=ltrim($_POST['cname']);
				$nic=ltrim($_POST['nic']);
				$weapon=ltrim($_POST['weapon']);
				$LicenseNo=ltrim($_POST['LicenseNo']);
				$product=$_POST['product'];
				$type=$_POST['subproduct'];
				$pmodel=$_POST['pmodel'];
				$from=$_POST['from'];
				$to=$_POST['to'];
				$plan=$_POST['plan'];
				
				header("Location:store.php?page=reportpurchase&name=$cname&nic=$nic&weapon=$weapon&license=$LicenseNo&product=$product&type=$type&from=$from&to=$to&pmodel=$pmodel&plan=$plan");
				
			}


?>
<div style="margin-top:0px;color:#000" align="center"><h3>Purchase Report</h3></div>
<form action="" method="post">
<table width="568" border="1" align="center" style="color:#000;font-size:16px;">
  <tr>
    <th width="240" scope="row">Name</th>
    <td width="312"><input type="text" name="cname" id="cname" autofocus="autofocus"/></td>
  </tr>
  <tr>
    <th scope="row">CNIC</th>
    <td width="312"><input type="text" name="nic" id="nic" /></td>
  </tr>
  <tr>
    <th scope="row">Weapon Number</th>
    <td width="312"><input type="text" name="weapon" id="weapon" /></td>
  </tr>
  <tr>
    <th scope="row">License NO</th>
    <td width="312"><input type="text" name="LicenseNo" id="LicenseNo" /></td>
  </tr>
  <tr>
    <th scope="row">Purchase From</th>
    <td width="312"><select name="plan" id="plan">
    <option value="" selected="selected">--SELECT OPTION--</option>
     <option value="Dealer">Dealer</option>
     <option valus="individual"><strong>Individual</option>
    </select></td>
  </tr>
  <tr>
    <th scope="row">Product </th>
    <td><select name="product" id="product" onchange="getPurch(this.value)">
      <option selected="selected" value="">--Select Option--</option>
      <option value="Acessories">--Acessories--</option>
      <option value="Fire Arms">--Fire Arms--</option>
      <option value="Ammunition">--Ammunition--</option>
       <option value="Air Rifle">--Air Rifle--</option>
    </select></td>
  </tr>
  <tr>
    <th scope="row">Product Type</th>
     <td><div id="subcat"></div></td>
  </tr>
  <tr>
    <th scope="row">From</th>
    <td><input type="date" name="from" id="from" /></td>
  </tr>
  <tr>
    <th scope="row">To</th>
    <td><input type="date" name="to" id="to" /></td>
  </tr>
  <tr>
    <th colspan="2" scope="row"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Search" /></th>
  </tr>
</table>
</form>