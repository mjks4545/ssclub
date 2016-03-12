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
<div align="center" style="color:#000;margin-top:0px;"><strong>
  <h3>Sale Report</h3></strong></div>
  <div align="center" style="color:#F00;font-size:large;margin-bottom:20px;"><strong><?php if(isset($_GET['msg'])){ echo $_GET['msg'];}?></strong></div>
<form id="form1" name="form1" method="post" action="">
  <table width="568" border="1" align="center" style="color:#000;font-size:16px;">
    <tr>
      <th width="240" scope="row">Name</th>
      <td width="312"><input type="text" name="cname" id="cname" autofocus/></td>
    </tr>
    <tr>
      <th scope="row">CNIC</th>
      <td width="312"><input type="text" name="nic" id="nic" /></td>
    </tr>
    <tr>
      <th scope="row">License NO</th>
      <td width="312"><input type="text" name="LicenseNo" id="LicenseNo" /></td>
    </tr>
    <tr>
      <th scope="row">Bill #</th>
      <td width="312"><input type="text" name="billno" id="billno" /></td>
    </tr>
    <tr>
      <th scope="row">Weapon #</th>
      <td width="312"><input type="text" name="weaponno" id="weaponno" /></td>
    </tr>
    <tr>
      <th scope="row">Membership</th>
      <td width="312"><select name="membership" id="membership">
      <option selected="selected" value="">--SELECT MEMEBERSHIPS---</option>
      <option value="Silver">---SILVER---</option>
      <option value="Gold">---GOLD---</option>
      <option value="Platinum">---PLATINIUM---</option>
       <option value="Walkin">---WALKIN---</option>
     </select></td>
    </tr>
    <tr>
      <th scope="row">Product </th>
      <td>
      <select name="product" id="product" onchange="getPurch(this.value)">
     	 <option selected="selected" value="">--Select Option--</option>
      	<option value="Acessories">--Acessories--</option>
      	<option value="Fire Arms">--Fire Arms--</option>
      	<option value="Ammunition">--Ammunition--</option>
        <option value="Air Rifle">--Air Rifle--</option>
        </select>
      </td>
    </tr>
    <tr>
      <th height="32" scope="row">Product Type</th>
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
      <th colspan="2" scope="row"><input type="submit" name="submit" class="btn btn-large btn-primary" value="Search"></th>
    </tr>
  </table>
</form>
