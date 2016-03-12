<?php
			if(isset($_POST['submit']))
				{
					$nic=ltrim($_POST['nic']);
					$regno=ltrim($_POST['regno']);
					$card=ltrim($_POST['card']);
					$name=ltrim($_POST['name']);
					$booth=ltrim($_POST['booth']);
					$fire=ltrim($_POST['fire']);
					$from=$_POST['from'];
					$to=$_POST['to'];
					$weaponname=ltrim($_POST['weaponname']);
					$weapon=$_POST['weapon'];
					$guestnic=$_POST['guestnic'];
					//$billno=$_POST['billno'];
					$membership=$_POST['membership'];
					header("Location:index.php?page=advanceresult&nic=$nic&name=$name&weaponname=$weaponname&weapon=$weapon&from=$from&to=$to&card=$card&booth=$booth&fire=$fire&membership=$membership&regno=$regno&guestnic=$guestnic");
				}
?>

<div align="center" style="padding-top:30px;color:#000"><strong><u>Advance Search</u></strong></div>

<div align="center" style="color:#000;padding-top:20px;">

<form  action="" method="post">
  <table width="285" border="0">
    <tr>
      <td width="127" nowrap="nowrap"><strong> Name</strong></td>
      <td width="148"><input type="text" name="name" id="name" autofocus="autofocus"/></td>
    </tr>
    <tr>
      <td nowrap="nowrap"><strong>Reg #</strong></td>
      <td width="148"><input type="text" name="regno" id="regno" autofocus="autofocus"/></td>
    </tr>
    <tr>
      <td width="127" nowrap="nowrap"><strong>Card NO</strong></td>
      <td width="148"><input type="text" name="card" id="nic"></td>
    </tr>
    <tr>
      <td width="127" nowrap="nowrap"><strong>NIC</strong></td>
      <td width="148"><input type="text" name="nic" id="nic2"   /></td>
    </tr>
    <tr>
      <td nowrap="nowrap"><strong>Guest NIC</strong></td>
      <td width="148"><input type="text" name="guestnic" id="guestnic" /></td>
    </tr>
    <tr>
      <td nowrap="nowrap"><strong>Booth No</strong></td>
      <td><input type="text" name="booth" id="nic3" /></td>
    </tr>
    <tr>
      <td nowrap="nowrap"><strong>Membership</strong></td>
      <td><select name="membership" id="membership">
        <option selected="selected" value="">--SELECT MEMEBERSHIPS---</option>
        <option value="Silver">---SILVER---</option>
        <option value="Gold">---GOLD---</option>
        <option value="Platinum">---PLATINIUM---</option>
        <option value="Walkin">---WALKIN---</option>
        <option value="All">---ALL MEMBERS---</option>
        </select></td>
    </tr>
    <tr>
      <td nowrap="nowrap"><strong>Weapon</strong></td>
      <td><select name="weapon" id="weapon">
        <option value="">Select Option</option>
        <option value="self">SELF</option>
        <option value="club">CLUB</option>
        </select></td>
    </tr>
    <tr>
      <td nowrap="nowrap"><strong>Weapon  Name/NO</strong></td>
      <td><input type="text" name="weaponname" id="weaponname" /></td>
    </tr>
    <tr>
      <td><strong>From</strong></td>
      <td><input type="date" name="from" id="from"></td>
    </tr>
    <tr>
      <td><strong>To</strong></td>
      <td><input type="date" name="to" id="to" /></td>
    </tr>
   	<tr>
      <td colspan="2" align="center"><button type="submit" class="btn btn-large btn-primary" name="submit">Search</button></td>
      </tr>
  </table>
</form>
</div>