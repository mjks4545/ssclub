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
<div class="main">
    <h1 style="width: 370px;">Purchase Report</h1>
</div>
<form action="" method="post">
    <table class="responstable">
  <tr>
    <td>Name :</td>
    <td><input type="text" name="cname" id="cname" autofocus="autofocus"/></td>
  </tr>
  <tr>
    <td>CNIC :</td>
    <td><input type="text" name="nic" id="nic" /></td>
  </tr>
  <tr>
    <td>Weapon Number :</td>
    <td><input type="text" name="weapon" id="weapon" /></td>
  </tr>
  <tr>
    <td>License NO :</td>
    <td><input type="text" name="LicenseNo" id="LicenseNo" /></td>
  </tr>
  <tr>
    <td>Purchase From :</td>
    <td>
        <select name="plan" id="plan">
            <option value="" selected="selected">--SELECT OPTION--</option>
            <option value="Dealer">Dealer</option>
            <option valus="individual"><strong>Individual</option>
        </select>
    </td>
  </tr>
  <tr>
    <td>Product :</td>
    <td>
      <select name="product" id="product" onchange="getPurch(this.value)">
        <option selected="selected" value="">--Select Option--</option>
        <option value="Acessories">--Acessories--</option>
        <option value="Ammunition">--Ammunition--</option>
        <option value="Pistol">--Pistol--</option>
        <option value="Rifle">--Rifle--</option>
        <option value="Shortgun">--Shortgun--</option>
        <option value="Air Rifle">--Air Rifle--</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>Product Type :</td>
     <td><div id="subcat"></div><div id="subofsubcat"></div></td>
  </tr>
  <tr>
        <td>Prd Code :</td>
        <td id="something"><input type="text" name="pcode" id="pcode" oninput=""></td>
    </tr>
  <tr>
    <td>From :</td>
    <td><input type="date" name="from" id="from" /></td>
  </tr>
  <tr>
    <td>To :</td>
    <td><input type="date" name="to" id="to" /></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Search" /></td>
  </tr>
</table>
</form>