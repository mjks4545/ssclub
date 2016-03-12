<?php
			if(isset($_POST['submit']))
				{
					$nic=ltrim($_POST['nic']);
					$regno=ltrim($_POST['regno']);
					$card=ltrim($_POST['card']);
					$name=ltrim($_POST['name']);
					$mobile=ltrim($_POST['mobile']);
					$booth=ltrim($_POST['booth']);
					$fire=ltrim($_POST['fire']);
					$from=$_POST['from'];
					$to=$_POST['to'];
					$weaponname=ltrim($_POST['weaponname']);
					$weapon=$_POST['weapon'];
					$guestnic=$_POST['guestnic'];
					//$billno=$_POST['billno'];
					$membership=$_POST['membership'];
					header("Location:index.php?page=advanceresult&nic=$nic&name=$name&weaponname=$weaponname&weapon=$weapon&from=$from&to=$to&card=$card&booth=$booth&fire=$fire&membership=$membership&regno=$regno&guestnic=$guestnic&mobile=$mobile");
				}
                        if(isset($_POST['mobilesearch'])){
                            header("Location:index.php?page=allmobilesearch");
                        }
?>

<div class="main">
    <h1 style="width: 380px;">Advance Search</h1>;
</div>
<form  action="" method="post">
    <table>
    <tr>
        <td><input type="submit" name="mobilesearch" value="Show all Numbers" /></td>
    </tr>
    </table>
</form>
<form  action="" method="post">
    <table class="responstable">
    <tr>
      <td>Name :</td>
      <td><input type="text" name="name" id="name" autofocus="autofocus" /></td>
    </tr>
    <tr>
      <td>Reg No :</td>
      <td><input type="text" name="regno" id="regno" autofocus="autofocus"/></td>
    </tr>
    <tr>
      <td>Mobile No :</td>
      <td><input type="text" name="mobile" id="mobile" autofocus="autofocus"/></td>
    </tr>
    <tr>
      <td>Card NO :</td>
      <td><input type="text" name="card" id="nic"></td>
    </tr>
    <tr>
      <td>NIC :</td>
      <td><input type="text" name="nic" id="nic2"   /></td>
    </tr>
    <tr>
      <td>Guest NIC :</td>
      <td><input type="text" name="guestnic" id="guestnic" /></td>
    </tr>
    <tr>
      <td><strong>Booth No</strong></td>
      <td><input type="text" name="booth" id="nic3" /></td>
    </tr>
    <tr>
      <td>Membership</td>
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
      <td>Weapon</td>
      <td><select name="weapon" id="weapon">
        <option value="">Select Option</option>
        <option value="self">SELF</option>
        <option value="club">CLUB</option>
        </select></td>
    </tr>
    <tr>
      <td>Weapon  Name / NO</td>
      <td><input type="text" name="weaponname" id="weaponname" /></td>
    </tr>
    <tr>
      <td>From</td>
      <td><input type="date" name="from" id="from"></td>
    </tr>
    <tr>
      <td>To</td>
      <td><input type="date" name="to" id="to" /></td>
    </tr>
   	
  </table>
      <button style="margin-left: 554px;" type="submit" class="btn btn-large btn-primary" name="submit">Search</button>
      
</form>


