<?php
			if(isset($_POST['submit']))
			{
				$name=ltrim($_POST['name']);
				$cnic=ltrim($_POST['cnic']);
				$cardno=ltrim($_POST['cardno']);
				$membership=$_POST['membership'];
				$mobile=ltrim($_POST['mobile']);
				$licenseno=ltrim($_POST['licenseno']);
				
				header("Location:index.php?page=memberresult&name=$name&nic=$cnic&cardno=$cardno&membership=$membership&mobile=$mobile&license=$licenseno");
				
			}

?>

<div align="center" style="padding-top:0px;color:#000"><strong><u>Member Search</u></strong></div>
<form name="form1" method="post" action="">
  <table width="458" border="0" align="center" style="color:#000;margin-top:30px;" >
    <tr>
      <th width="213" scope="row">Name</th>
      <td width="229"><input type="text" name="name" id="name" autofocus="autofocus"></td>
    </tr>
    <tr>
      <th scope="row">CNIC</th>
      <td><input type="text" name="cnic" id="cnic"></td>
    </tr>
    <tr>
      <th scope="row">Card NO</th>
      <td><input type="text" name="cardno" id="cardno"></td>
    </tr>
    <tr>
      <th scope="row">Membership</th>
      <td><select name="membership" id="membership">
      <option selected="selected" value="">--SELECT MEMEBERSHIPS---</option>
      <option value="Silver">---SILVER---</option>
      <option value="Gold">---GOLD---</option>
      <option value="Platinum">---PLATINIUM---</option>
     </select></td>
    </tr>
    <tr>
      <th scope="row">Mobile</th>
      <td><input type="text" name="mobile" id="mobile"></td>
    </tr>
    <tr>
      <th scope="row"><strong>License No</strong></th>
      <td><input type="text" name="licenseno" id="licenseno"></td>
    </tr>
    <tr>
      <th scope="row">Search All Members</th>
      <td><a href="index.php?page=searchallmember" style="font-size:14px;background:#06F;color:#FFF;padding:5px;">&nbsp;Search All Members</a></td>
    </tr>
    <tr>
      <th height="59" colspan="2" scope="row"><button type="submit" class="btn btn-large btn-primary" name="submit">Search</button></th>
    </tr>
  </table>
</form>
