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
			if(isset($_POST['mobilesearch'])){
                            header("Location:index.php?page=allmembersearch");
                        }

?>

<div class="main">
    <h1 style="width: 342px;">Member Search</h1>
</div>

<form  action="" method="post">
    <table>
    <tr>
        <td><input type="submit" name="mobilesearch" value="Show all Numbers" /></td>
    </tr>
    </table>
</form>
   
<form name="form1" method="post" action="">
    <table class="responstable">
    <tr>
      <td>Name :</td>
      <td><input type="text" name="name" id="name" autofocus="autofocus"></td>
    </tr>
    <tr>
      <td>CNIC</td>
      <td><input type="text" name="cnic" id="cnic"></td>
    </tr>
    <tr>
      <td>Card NO</td>
      <td><input type="text" name="cardno" id="cardno"></td>
    </tr>
    <tr>
      <td>Membership</td>
      <td><select name="membership" id="membership">
      <option selected="selected" value="">--SELECT MEMEBERSHIPS---</option>
      <option value="Silver">---SILVER---</option>
      <option value="Gold">---GOLD---</option>
      <option value="Platinum">---PLATINIUM---</option>
     </select></td>
    </tr>
    <tr>
      <td>Mobile</td>
      <td><input type="text" name="mobile" id="mobile"></td>
    </tr>
    <tr>
      <td>License No</td>
      <td><input type="text" name="licenseno" id="licenseno"></td>
    </tr>
    <tr>
      <td>Search All Members</td>
      <td><a href="index.php?page=searchallmember" style="font-size:14px;background:#06F;color:#FFF;padding:5px;">&nbsp;Search All Members</a></td>
    </tr>
</table>
    <button type="submit" class="btn btn-large btn-primary" style="margin-left: 550px;" name="submit">Search</button>

</form>
