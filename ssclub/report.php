<?php
ob_start();
			if(isset($_POST['submit']))
			{
				$cname=ltrim($_POST['cname']);
				$nic=ltrim($_POST['nic']);
				$LicenseNo=ltrim($_POST['LicenseNo']);
				$billno=ltrim($_POST['billno']);
                                $weaponno = ltrim($_POST['weaponno']);
				$product=$_POST['product'];
				$type=$_POST['subproduct'];
				$pmodel=$_POST['pmodel'];
				$from=$_POST['from'];
				$to=$_POST['to'];
				$membership=$_POST['membership'];
				
				header("Location:store.php?page=reportresult&name=$cname&prodcut=$product&from=$from&to=$to&type=$type&nic=$nic&LicenseNo=$LicenseNo&pmodel=$pmodel&membership=$membership&billno=$billno&weaponno=$weaponno");
				
			}

?>
<div class="main">
    <h1>Sale Report</h1>
</div>
  <div align="center" style="color:#F00;font-size:large;margin-bottom:20px;"><strong><?php if(isset($_GET['msg'])){ echo $_GET['msg'];}?></strong></div>
<form id="form1" name="form1" method="post" action="">
    <table class="responstable">
    <tr>
      <td>Name :</td>
      <td><input type="text" name="cname" id="cname" autofocus/></td>
    </tr>
    <tr>
      <td>CNIC</td>
      <td><input type="text" name="nic" id="nic" /></td>
    </tr>
    <tr>
      <td>License NO</td>
      <td><input type="text" name="LicenseNo" id="LicenseNo" /></td>
    </tr>
    <tr>
      <td>Bill #</td>
      <td><input type="text" name="billno" id="billno" /></td>
    </tr>
    <tr>
      <td>Weapon #</td>
      <td><input type="text" name="weaponno" id="weapon" /></td>
    </tr>
    <tr>
      <td>Membership</td>
      <td>
          <select name="membership" id="membership">
            <option selected="selected" value="">--SELECT MEMEBERSHIPS---</option>
            <option value="Silver">---SILVER---</option>
            <option value="Gold">---GOLD---</option>
            <option value="Platinum">---PLATINIUM---</option>
            <option value="Walkin">---WALKIN---</option>
            </select>
      </td>
    </tr>
    <tr>
      <td>Product </td>
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
      <td>Product Type</td>
   	  <td><div id="subcat"></div><div id="subofsubcat"></div></td>
    </tr>
    <tr>
        <td>Prd Code</td>
        <td id="something"><input type="text" name="pcode" id="pcode" oninput=""></td>
    </tr>
    <tr>
      <td>From</td>
      <td><input type="date" name="from" id="from" /></td>
    </tr>
    <tr>
      <td>To</td>
      <td><input type="date" name="to" id="to" /></td>
    </tr>
    <tr>
      <td colspan="2" scope="row"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Search"></td>
    </tr>
  </table>
</form>
